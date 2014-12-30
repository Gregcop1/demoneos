module.exports =
  html:
    files:'<%= in8.htmlSrc %>/**'
    options:
      reload: true

  php:
    files:'<%= in8.phpSrc %>/**/*.php'
    options:
      reload: true

  typoscript:
    files: ['<%= in8.tsSrc %>*.ts2', '../ext_typoscript_constants**']
    options:
      reload: true

  configuration:
    files:'<%= in8.confSrc %>/*.yaml'
    options:
      reload: true

  sass:
    files:'<%= in8.cssSrc %>/*.scss'
    tasks: [
      'sass:build',
      'autoprefixer:build'
    ]

  images:
    files:[
      '<%= in8.imgSrc %>/**'
    ]

  coffee:
    files: '<%= in8.jsSrc %>/*.coffee'
    tasks: 'newer:coffee:build'

  coffeeFlex:
    files: '<%= in8.flexJsSrc %>/*.coffee'
    tasks: 'newer:coffee:flex'

  coffeeComponents:
    files:'<%= in8.jsComponentSrc %>/*.coffee'
    tasks: 'newer:coffee:component'