## About Project

EASY LIFE BASE is a project developed by [Azimut Business Solutions](http://azimutbs.com), to cover needs in BAGUEL

## Installation

For development purpose, and to install the project, please:
- **Clone the project**
``` bash
git clone https://github.com/BahaaeddineAzimut/baguel_project.git
```

- **Install required libraries and packages**
``` bash
php artisan composer:install
```

- **Install required npm packages**
``` bash
npm install
```

## Creating JS assets

To create a new js file to be compiled with npm, please:
- Create a folder under **ressources/js** to have better files organisation
- set name of file as: **file_name.compile.js**
- run again:
``` bash
npm run watch
```
to compile new created files,
result files will be found under:
**public/js/**
