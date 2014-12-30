$(document).on "ready", ->
  unless in_quickAccess?
    in_quickAccess = true
    $('.quickaccess').each ()->
      new Slide(this)

unless Slide?
  class Slide
    slideWidth : 145
    constructor :(el, @current) ->
      @current = 0 unless @current
      @setElements(el)
      if Modernizr.touch
        overflow = "scroll"
      else
        overflow = "hidden"
      @$screen.css
        "overflow-x": overflow
      @lastIndex = @$slides.length-1
      @refresh()
      $(window).on "resize", @refresh
      return @

    do: (e) =>
      action =  @[@getAction($(e.target).closest('.control'))]
      if action
        action()
      return @

    goTo: (index) =>
      if index < 0
        index = 0
      else if index > @lastIndex-@limit
        return @last()
      @current = index
      @checkControls()
      @$slider.css
        "margin-left": - $(@$slides[index]).position().left
      return @

    last: =>
      @current = @lastIndex-@limit
      @checkControls()
      @$slider.css
        "margin-left": - @$slider.width() + @$screen.width()
      return @

    previous: =>
      @goTo(@current-@limit+1)
      return @

    next: =>
      @goTo(@current+@limit-1)
      return @

    first: =>
      @goTo(0)
      return @

    checkControls: () ->
      if @current == 0
        @$previous.addClass("disabled")
      else
        @$previous.removeClass("disabled")

      if @current >= @lastIndex-@limit
        @$next.addClass("disabled")
      else
        @$next.removeClass("disabled")
      return @

    getAction: ($button) ->
      return $button.attr('data-action')

    setSizes: () ->
      @$slider.width @getsliderWidth()
      return @

    getsliderWidth: ->
      slideWidth = 0
      @$slides.each ->
        slideWidth += $(this).outerWidth()
      return slideWidth

    getStatus: ->
      return @$slider.width() > @$screen.width()

    setLimit: (@limit) ->
      return @

    getLimit: ->
      return Math.floor(@$screen.width() / @slideWidth)

    setElements: (@el) ->
      @$el = $(@el)
      @$controls = @find('.control')
      @$previous = @find('.previous, .first')
      @$next = @find('.next, .last')
      @$screen = @find('.screen')
      @$slider = @find('.slider')
      @$slides = @find('.item')
      return @

    refresh: =>
      @setSizes()
      @setLimit(@getLimit())
      if @getStatus()
        @active = true
        @$controls.off "click"
        @$controls.on "click", @do
      else
        @active = false
        @$controls.off "click"
      @checkControls()

    find: (selector) ->
      return @$el.find(selector)

    disable: ->
      @active = false
      @$controls.hide()
      @goTo(0)

    enable: ->
      @active = true
      @$controls.show()
      @goTo(@current)