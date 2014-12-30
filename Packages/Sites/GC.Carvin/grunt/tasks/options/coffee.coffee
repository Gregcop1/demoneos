module.exports =
  build:
    options:
      sourceMap: true
    expand: true
    flatten: true
    cwd: '<%= in8.jsSrc %>'
    src: ['*.coffee']
    dest: '<%= in8.jsDest %>'
    ext: '.js'

  flex:
    options:
      sourceMap: true
    expand: true
    flatten: true
    cwd: '<%= in8.flexJsSrc %>'
    src: ['*.coffee']
    dest: '<%= in8.flexJsDest %>'
    ext: '.js'

  component:
    options:
      sourceMap: true
    expand: true
    flatten: true
    cwd: '<%= in8.jsComponentSrc %>'
    src: ['*.coffee']
    dest: '<%= in8.jsComponentDest %>'
    ext: '.js'
