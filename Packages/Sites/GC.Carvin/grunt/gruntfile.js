(function() {
  'use strict';
  var loadConfig, mountFolder, registerTasks;

  mountFolder = function(connect, dir) {
    return connect["static"](require('path').resolve(dir));
  };

  loadConfig = function(path) {
    var glob, object;
    glob = require('glob');
    object = {};
    glob.sync('*', {
      cwd: path
    }).forEach(function(option) {
      var key;
      key = option.replace(/\.coffee$/, '');
      return object[key] = require(path + option);
    });
    return object;
  };

  registerTasks = function(grunt, path) {
    var glob, object;
    glob = require('glob');
    object = [];
    glob.sync('*.coffee', {
      cwd: path
    }).forEach(function(option) {
      var key;
      key = option.replace(/\.coffee$/, '');
      return grunt.registerTask('key', require(path + option)(grunt));
    });
    return object;
  };

  module.exports = function(grunt) {
    var config;
    require("load-grunt-tasks")(grunt);
    config = {
      pkg: grunt.file.readJSON('package.json'),
      env: process.env,
      in8: {
        phpSrc: '../Classes',
        tsSrc: '../Resources/Private/**/',
        confSrc: '../Configuration/',
        jsSrc: '../Resources/Public/js/src',
        jsComponentSrc: '../Resources/Public/js/components/src',
        jsComponentDest: '../Resources/Public/js/components',
        jsDest: '../Resources/Public/js',
        imgSrc: '../Resources/Public/img',
        cssSrc: '../Resources/Public/css/src',
        cssDest: '../Resources/Public/css',
        htmlSrc: '../Resources/Private',
        langDest: '../Resources/Private/Language/',
        liveport: grunt.option('liveport') || 35729
      }
    };
    grunt.util._.extend(config, loadConfig('./tasks/options/'));
    grunt.initConfig(config);
    return registerTasks(grunt, './tasks/');
  };

}).call(this);

//# sourceMappingURL=gruntfile.js.map
