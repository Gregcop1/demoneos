module.exports =
  options:
    root:  "../"
    out:  "docs/"
    index:  "README.md"
  all:
    options:
      # `Ressources' directory is there to fix a strange path behavior of groc
      glob: ["README.md", "TODO.md", "Resources/" , "Resources/Public/js/src/*.coffee", "Resources/Public/css/src/*.scss"]