module.exports =
  dev:
    options:
      watchTask: true

    bsFiles:
      src : [
        '<%= in8.cssDest %>/*.css'
        '<%= in8.htmlSrc %>/**'
        '<%= in8.phpSrc %>/**/*.php'
        '<%= in8.tsSrc %>/**'
        '<%= in8.jsDest %>/*.js'
        '<%= in8.jsComponentDest %>/*.js'
        '<%= in8.langDest %>/*.xlf'
      ]

