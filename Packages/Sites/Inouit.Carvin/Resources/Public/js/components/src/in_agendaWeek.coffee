$(document).on "ready", ->
  unless in_agendaWeek?
    in_agendaWeek = true
    $('.tx-in-agenda').each ()->
      window.inAgendaWeek = new AgendaWeek(this)

# Manage Initialisation and tab navigation
unless AgendaWeek?
  class AgendaWeek
    constructor :(el) ->
      @setElements(el)
      @$agendaDays = @find('.agenda-day')
      for agendaDay in @$agendaDays
        $agendaDay = $(agendaDay)
        @addTab($agendaDay)
        @addSlide($agendaDay)
      $tabContainer = $('<div class="agenda-tabs"/>')
      $tabContainer.append @$tabs
      @$el.prepend $tabContainer
      new TabSlide(@$el)
      return @

    setElements: (@el) ->
      @$el = $(@el)
      @$tabs = $()

    find: (selector) ->
      return @$el.find(selector)

    addTab: ($day) ->
      id = $day.index()
      $day.attr('data-id',id )
      $label = @getLabel($day).wrap('<li class="agenda-tab" data-id="'+id+'" />').parent()
      @$tabs = @$tabs.add($label)
      return @

    getLabel: ($day) ->
      return $day.find('.agenda-day-label')

    addSlide: ($day) ->
      new Slide($day)
      return @




# Manage inner slides
unless Slide?
  class Slide
    constructor :(@$el) ->
      @current = 0
      @setElements()
      if Modernizr.touch
        overflow = "scroll"
      else
        overflow = "hidden"
      @$screen.css
        "overflow-x": overflow
      @lastIndex = @$slides.length-1
      @refresh()
      @goTo(@current)
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
      else if index > @lastIndex
        return @last()
      @current = index
      @checkControls()
      @$slider.css
        "margin-left": - $(@$slides[index]).position().left
      return @

    last: =>
      @current = @lastIndex
      @checkControls()
      @$slider.css
        "margin-left": - @$slider.width() + @$screen.width()
      return @

    previous: =>
      @goTo(@current-1)
      return @

    next: =>
      @goTo(@current+1)
      return @

    first: =>
      @goTo(0)
      return @

    checkControls: () ->
      if !@active then return @
      if @current == 0
        @$previous.addClass("disabled")
      else
        @$previous.removeClass("disabled")

      if @current >= @lastIndex
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

    setElements: () ->
      @setControls()
      @$screen = @children('.screen')
      @$slider = @$screen.children('.slider')
      @$slides = @$slider.children('.item')
      return @

    setControls: ->
      @$controls = @children('.controls').children('.control')
      @$previous = @$controls.filter('.previous, .first')
      @$next = @$controls.filter('.next, .last')
      return @

    refresh: =>
      @setSizes()
      if @getStatus()
        @active = true
        @$controls.removeClass "disabled"
        @$controls.off "click"
        @$controls.on "click", @do
        @checkControls()
      else
        @active = false
        @$controls.addClass "disabled"
        @$controls.off "click"
        @goTo(0)
      return @

    find: (selector) ->
      return @$el.find(selector)

    children: (selector) ->
      return @$el.children(selector)



# Manage inner slides
unless TabSlide?
  class TabSlide extends Slide
    constructor :(@$el) ->
      super(@$el)

    goTo: (index) =>
      super(index)
      @$controls.removeClass('active')
      $('[data-id="'+index+'"').addClass('active')
      return @

    do: (e) =>
      @goTo(parseInt($(e.target).closest('.agenda-tab').attr('data-id')))
      return @

    setControls: ->
      @$controls = @children('.agenda-tabs').children('.agenda-tab')
      @$previous = @$controls.children('.previous, .first')
      @$next = @$controls.children('.next, .last')
      return @

    setSizes: () ->
      @$slides.width($(window).width())
      @$slider.width @getsliderWidth()
      return @

