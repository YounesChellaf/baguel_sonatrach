var routes = require('./routes.json');
let baseUrl = config.webServer.url;
exports.route = function() {
  var args = Array.prototype.slice.call(arguments);
  var name = args.shift();

  if (routes[name] === undefined) {
    console.error('Unknown route ', name);
  } else {
    return baseUrl + '/' + routes[name]
    .split('/')
    .map(s => s[0] == '{' ? args.shift() : s)
    .join('/');
  }
};
exports.showBodyLoader = function(){
  $("#loading").css({'display': 'block'});
};

exports.hideBodyLoader = function(){
  $("#loading").css({'display': 'none'});
};
