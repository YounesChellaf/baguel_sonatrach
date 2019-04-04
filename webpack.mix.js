const mix = require('laravel-mix');
const glob = require('glob')
const path = require('path')
/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
|
| Mix provides a clean, fluent API for defining some Webpack build steps
| for your Laravel application. By default, we are compiling the Sass
| file for the application as well as bundling up all the JS files.
|
*/



function _mapExt(ext, mapping) {
  if(typeof mapping === 'string') {
    return mapping;
  }

  if (mapping && mapping.hasOwnProperty(ext)) {
    return mapping[ext];
  }

  return false;
}

// map the extension to the provided mapping, if not then to the default, if not then it return the extension itself
function mapExt(ext, mapping, defaultMapping) { // return false if there is not matching (check for false and take same extension)
  let mp = _mapExt(ext, mapping);
  if(mp) return mp;

  return _mapExt(ext, defaultMapping);
  // let mp = _mapExt(ext, mapping);
  // if(mp) return mp;
  // let dmp = _mapExt(defaultMapping);
  // if(dmp) return dmp;
  // return fa;
}

function mixBaseGlob(mixFuncName, glb, output, mixOptions, options, defaultExtMapping, defaultSpecifier) {
  let files = glob.sync(glb);
  // let mixInstance = null;
  let fl; // file var to make the output
  let out;
  let ext;
  let re_speci;
  let re_ext;
  let extMapping = defaultExtMapping; // this mean map any extension to css ('otherwise you provide an mapping object)
  let extmap;

  // handling options access
  if (!options) options = {};
  if (!options.compileSpecifier) options.compileSpecifier = {};

  //handling globale opational values (with default)

  if (!options.compileSpecifier.disabled) { // if not disabled, the we set the regex that correspond to it, depending on the specifier
    let specifier = defaultSpecifier;
    if (options.compileSpecifier.specifier) {
      specifier = options.compileSpecifier.specifier;
    }
    re_speci = new RegExp(`.${specifier}.(?!.*${specifier}.)`, 'g');
  } // doing it here for better performance hhh! {even doesn't really matter it's something that get executed jsut once }

  //mapping
  if (options.extMapping) {
    extMapping = options.extMapping;
  }

  files.forEach((file) => {
    console.log('>');
    // console.log("src=  " , file);

    if (options.base) {
      fl = file.replace(options.base, '');
      // console.log('file = ', file);
    } else {
      fl = file;
    }
    console.log('=> ', fl);

    // handling specifier

    if (!options.compileSpecifier.disable) {
      fl = fl.replace(re_speci, '.');
      console.log('=> ', fl);
    }


    //handling extension mapping (and replace)
    ext = path.extname(fl).substr(1);
    console.log('==> ext = ', ext);
    re_ext = new RegExp(`${ext}$`, 'g');
    extmap = mapExt(ext, extMapping, defaultExtMapping);
    console.log('==> extmap = ', extmap);
    if (ext !== extmap) {
      fl = fl.replace(re_ext, extmap);
    }

    console.log('==> fl = ', fl);
    out = path.join(output, fl);
    // let out = path.dirname(path.join(output, fl));
    //    console.dir(this.mix);
    if (mixOptions) {
      console.log(mixFuncName);
      this.mixInst = this.mixInst[mixFuncName](file, out, mixOptions);
    } else {
      console.log(mixFuncName);

      this.mixInst = this.mixInst[mixFuncName](file, out);
    }

    console.log('fl = ', fl);
    console.log('file = ', file);
    console.log('out = ', out);

    // console.dir(this.mixInst);
  });
}


const mixFuncs = {
  //default specifier = 'compile for all'
  // usage glob => *.compile.ext to check against only compile.ext. . or *.compile.* (all extensions preceded with compile)
  sass: {
    mapExt: 'css'
  },
  js: {
    mapExt: 'js'
  }
}

function _mixDefaultMapExt (mixFunc, passedMapping, defaultMapping) {
  let ext = mapExt(mixFunc, passedMapping, defaultMapping);
  console.error('!!!!!!!!!', ext);
  if(ext) return ext;
  throw 'defaultMapExt: no mapping precised, neither it\'s supported by default';
}

function defaultMapExt (mixFunc, mapping) {
  let mixFuncExt = null;
  if (mixFuncs[mixFunc]) {
    console.log('=========mixFuncs[funcName].mapExt==========> ', mixFuncs[mixFunc].mapExt);
    mixFuncExt = mixFuncs[mixFunc].mapExt;
  }
  return _mixDefaultMapExt(mixFunc, mapping, mixFuncExt);
}

// make a function like for extMapping
//but for mixFunc (if there is a precised mapping, we use that, if not we use the default mapping, if not available (didn't supported one of the mixFunc) error will be thrown)

// console.dir(mix);
// for (var property in mix) {
//     if (!mix.hasOwnProperty(property)) continue;
//     console.log(property);
//     // Do stuff...
// }

class MixGlob {
  constructor(mappings) {
    console.log('ih');
    if(!mappings) mappings = {};

    this.mixInst = mix;
    console.log("mix imxmix");
    //console.dir(mix);
    // console.dir(this.mix);
    Object.keys(mix).forEach(function (mixFunc, index) {
      console.log(index);
      if (!(['mix','config', 'scripts', 'styles'].includes(mixFunc))) {
        console.log('=====================+++++>"' + mixFunc + '"');
        //[glb1] <<<====
        this[mixFunc] = function (glb, output, mixOptions, options) {
          //[glb1] when you write all the default extensions for all of them tatke it out
          let defaultExtMapping = defaultMapExt(mixFunc, mappings.mapExt);

          mixBaseGlob.call(this, mixFunc, glb, output, mixOptions, options, defaultExtMapping, 'compile');
          return this;
        }.bind(this);
      }
    }.bind(this));
    // this.mix
  }

  createMapping(mappings) {
    // following the mixFunc on the mapping, you update there corresponding functions in the object
    // ->!!!!! to be done
  }

  //expose originale mix functions (can be chained with mixGlob)
  mix(mixFuncName) { // usage : .mix('scripts')('', '').js().mix('minify')(...).
  return function () {
    console.log(arguments);
    mix[mixFuncName].apply(mix, arguments);
    return this;
  }.bind(this);
}

// sass(glb, output, options) {
//     let files = glob.sync(glb);
//     // let mixInstance = null;
//     let fl; // file var to make the output
//     let out;
//     let ext;
//     let re_speci;
//     let re_ext;
//     let defaultExtMapping = 'css';
//     let extMapping = 'css'; // this mean map any extension to css ('otherwise you provide an mapping object)
//     let extmap;

//     // handling options access
//     if (!options) options = {};
//     if(!options.compileSpecifier) options.compileSpecifier = {};

//     //handling globale opational values (with default)

//     if (!options.compileSpecifier.disabled){ // if not disabled, the we set the regex that correspond to it, depending on the specifier
//         let specifier = 'compile';
//         if (options.compileSpecifier.specifier) {
//             specifier = options.compileSpecifier.specifier;
//         }
//         re_speci = new RegExp(`.${specifier}.(?!.*${specifier}.)`, 'g');
//     } // doing it here for better performance hhh! {even doesn't really matter it's something that get executed jsut once }

//         //mapping
//     if(options.extMapping) {
//         extMapping = options.extMapping;
//     }

//     files.forEach((file) => {
//         // console.log('>');
//         // // console.log("src=  " , file);

//         if(options.base) {
//             fl = file.replace(options.base, '');
//             // // console.log('file = ', file);
//         } else {
//             fl = file;
//         }
//         // console.log('=> ', fl);

//         // handling specifier

//         if (!options.compileSpecifier.disable){
//             fl = fl.replace(re_speci, '.');
//             // console.log('=> ', fl);
//         }


//         //handling extension mapping (and replace)
//         ext = path.extname(fl).substr(1);
//         // console.log('==> ext = ', ext);
//         re_ext = new RegExp(`${ext}$`, 'g');
//         extmap = mapExt(ext, extMapping, defaultExtMapping);
//         // console.log('==> extmap = ', extmap);
//         if(ext !== extmap) {
//             fl = fl.replace(re_ext, extmap);
//         }

//         // console.log('==> fl = ', fl);
//         out = path.join(output, fl);
//         // let out = path.dirname(path.join(output, fl));

//         this.mix = this.mix.sass(file, out);

//         // console.log('fl = ', fl);
//         // console.log('file = ', file);
//         // console.log('out = ', out);

//     });
//     return this;
// }
}



mixGlob = new MixGlob();

mixGlob.sass('resources/sass/**/*.compile.scss', 'public/css', null, {
  base: 'resources/sass/',
  // compileSpecifier: {
  //     disabled: true // there is no compile specifier (disabled), and so it will not be removed from the extension (by default disabled = false, and the default specifier = 'compile', and it get removed from the path)
  //      ,
  //      specifier: 'cmp'
  // }
  // extMapping: {
  //     'scss': 'cssExtra'
  // }
  //extMapping: 'cssExtra' // all the files whatever the extension, like a wildcard.
}).js('resources/js/**/*.compile.js', 'public/js/', null, {
  base: 'resources/js/'
});



/*
things to do :
==================

refactor, the glob, matching, paths recreations to a separate function.
=> use it to create other functions then sass
(support what mix have to offer. if there is a way to do it automatically do it)

possible way [have the function passed to mixGlob used directly with mix. Then set just default values for each type, mapping, (it will be a lot easier)]


==!!! add js
add others


important
==>
add support for mix default third option parameter (pass it at it is (and think more on it))


support for forcing output name [case globe have just one file, otherwise thorw error]
*/
