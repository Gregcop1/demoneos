$(document).on "ready", ->
    $('.news-list').each ()->
      new Tiles(this)

# Manage Initialisation and tab navigation
class Tiles
  constructor :(el) ->
    @setElements(el)
      .setOffsets()

    $(window).on "resize", @setOffsets
    return @

  setOffsets: =>
    @rowLength = @getRowLength()
    for tile in @$tiles
      $tile = $(tile)
      if $tile.index() > @rowLength - 1
        $tile.css "margin-top", -@getOffset($tile)
    return @

  setElements: (@el) ->
    @$el = $(@el)
    @$tiles = @find('.news-item')
    return @

  find: (selector) ->
    return @$el.find(selector)

  getRowLength: ->
    return 4

  getBottom: ($tile) ->
    return $tile.position().top + $tile.outerHeight() + parseInt($tile.css("margin-top"))

  getRowIndex: ($tile) ->
    if (($tile.index() + 1) % @rowLength)
      return (($tile.index() + 1) % @rowLength)
    else
      return @rowLength - 1

  getPrevRow: ($tile) ->
    from = @getRowIndex($tile)
    to = from + @rowLength
    return $tile.prevAll()[from...to]

  getRowBottom: ($row) ->
    max = 0
    for tile in $row
      $tile = $(tile)
      bottom = @getBottom($tile)
      if bottom > max
        max = bottom
    return max

  getUpsideElement: ($tile) ->
    return $($tile.prevAll()[@rowLength-1])

  getOffset: ($tile) ->
    $rowBottom = @getRowBottom(@getPrevRow($tile))
    $upsideElement = @getBottom(@getUpsideElement($tile))
    return $rowBottom - $upsideElement