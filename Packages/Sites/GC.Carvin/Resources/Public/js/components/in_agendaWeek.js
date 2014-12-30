(function() {
  var AgendaWeek, Slide, TabSlide,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; },
    __hasProp = {}.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

  $(document).on("ready", function() {
    return $('.tx-in-agenda').each(function() {
      var inAgendaWeek;
      return inAgendaWeek = new AgendaWeek(this);
    });
  });

  AgendaWeek = (function() {
    function AgendaWeek(el) {
      var $agendaDay, $tabContainer, agendaDay, _i, _len, _ref;
      this.setElements(el);
      this.$agendaDays = this.find('.agenda-day');
      _ref = this.$agendaDays;
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        agendaDay = _ref[_i];
        $agendaDay = $(agendaDay);
        this.addTab($agendaDay);
        this.addSlide($agendaDay);
      }
      $tabContainer = $('<div class="agenda-tabs"/>');
      $tabContainer.append(this.$tabs);
      this.$el.prepend($tabContainer);
      $tabContainer.wrapInner('<ul class="page" />');
      new TabSlide(this.$el);
      return this;
    }

    AgendaWeek.prototype.setElements = function(el) {
      this.el = el;
      this.$el = $(this.el);
      return this.$tabs = $();
    };

    AgendaWeek.prototype.find = function(selector) {
      return this.$el.find(selector);
    };

    AgendaWeek.prototype.addTab = function($day) {
      var $label, id;
      id = $day.index();
      $day.attr('data-id', id);
      $label = this.getLabel($day).wrap('<li class="agenda-tab" data-id="' + id + '" />').parent();
      this.$tabs = this.$tabs.add($label);
      return this;
    };

    AgendaWeek.prototype.getLabel = function($day) {
      return $day.find('.agenda-day-label');
    };

    AgendaWeek.prototype.addSlide = function($day) {
      new Slide($day);
      return this;
    };

    return AgendaWeek;

  })();

  Slide = (function() {
    function Slide($el) {
      var overflow;
      this.$el = $el;
      this.refresh = __bind(this.refresh, this);
      this.first = __bind(this.first, this);
      this.next = __bind(this.next, this);
      this.previous = __bind(this.previous, this);
      this.last = __bind(this.last, this);
      this.goTo = __bind(this.goTo, this);
      this["do"] = __bind(this["do"], this);
      this.current = 0;
      this.setElements();
      if (Modernizr.touch) {
        overflow = "scroll";
      } else {
        overflow = "hidden";
      }
      this.$screen.css({
        "overflow-x": overflow
      });
      this.lastIndex = this.$slides.length - 1;
      this.refresh();
      this.goTo(this.current);
      $(window).on("resize", this.refresh);
      return this;
    }

    Slide.prototype["do"] = function(e) {
      var action;
      action = this[this.getAction($(e.target).closest('.control'))];
      if (action) {
        action();
      }
      return this;
    };

    Slide.prototype.goTo = function(index) {
      if (index <= 0) {
        index = 0;
      } else if ($(this.$slides[index]).position().left > (this.getSliderWidth() - this.$screen.width())) {
        return this.last();
      }
      this.current = index;
      this.checkControls();
      this.$slider.css({
        "margin-left": -$(this.$slides[index]).position().left
      });
      return this;
    };

    Slide.prototype.last = function() {
      this.current = this.lastIndex;
      this.checkControls();
      this.$slider.css({
        "margin-left": -this.$slider.width() + this.$screen.width()
      });
      return this;
    };

    Slide.prototype.previous = function() {
      this.goTo(this.current - 1);
      return this;
    };

    Slide.prototype.next = function() {
      this.goTo(this.current + 1);
      return this;
    };

    Slide.prototype.first = function() {
      this.goTo(0);
      return this;
    };

    Slide.prototype.checkControls = function() {
      if (!this.active) {
        return this;
      }
      if (this.current === 0) {
        this.$previous.addClass("disabled");
      } else {
        this.$previous.removeClass("disabled");
      }
      if (this.current >= this.lastIndex) {
        this.$next.addClass("disabled");
      } else {
        this.$next.removeClass("disabled");
      }
      return this;
    };

    Slide.prototype.getAction = function($button) {
      return $button.attr('data-action');
    };

    Slide.prototype.setSizes = function() {
      this.$slider.width(this.getSliderWidth());
      return this;
    };

    Slide.prototype.getSliderWidth = function() {
      var slideWidth;
      slideWidth = 0;
      this.$slides.each(function() {
        return slideWidth += $(this).outerWidth();
      });
      return slideWidth;
    };

    Slide.prototype.getLastIndex = function() {
      var $slide, boundaryOffset, screenWidth, slide, sliderWidth, _i, _ref;
      sliderWidth = this.getSliderWidth();
      screenWidth = this.$screen.width();
      boundaryOffset = sliderWidth - screenWidth;
      _ref = this.$slides;
      for (_i = _ref.length - 1; _i >= 0; _i += -1) {
        slide = _ref[_i];
        $slide = $(slide);
        if ($slide.position().left < boundaryOffset) {
          return $slide.index() + 1;
        }
      }
      return -1;
    };

    Slide.prototype.getStatus = function() {
      return this.$slider.width() > this.$screen.width();
    };

    Slide.prototype.setElements = function() {
      this.setControls();
      this.$screen = this.children('.screen');
      this.$slider = this.$screen.children('.slider');
      this.$slides = this.$slider.children('.item');
      return this;
    };

    Slide.prototype.setControls = function() {
      this.$controls = this.children('.controls').children('.control');
      this.$previous = this.$controls.filter('.previous, .first');
      this.$next = this.$controls.filter('.next, .last');
      return this;
    };

    Slide.prototype.refresh = function() {
      this.setSizes();
      if (this.getStatus()) {
        this.lastIndex = this.getLastIndex();
        this.active = true;
        this.$controls.removeClass("disabled");
        this.$controls.off("click");
        this.$controls.on("click", this["do"]);
        this.checkControls();
      } else {
        this.active = false;
        this.$controls.addClass("disabled");
        this.$controls.off("click");
        this.goTo(0);
      }
      return this;
    };

    Slide.prototype.find = function(selector) {
      return this.$el.find(selector);
    };

    Slide.prototype.children = function(selector) {
      return this.$el.children(selector);
    };

    return Slide;

  })();

  TabSlide = (function(_super) {
    __extends(TabSlide, _super);

    function TabSlide($el) {
      this.$el = $el;
      this["do"] = __bind(this["do"], this);
      this.goTo = __bind(this.goTo, this);
      TabSlide.__super__.constructor.call(this, this.$el);
    }

    TabSlide.prototype.goTo = function(index) {
      TabSlide.__super__.goTo.call(this, index);
      this.$controls.removeClass('active').filter('[data-id="' + index + '"]').addClass('active');
      this.$slides.removeClass('active').filter('[data-id="' + index + '"]').addClass('active');
      return this;
    };

    TabSlide.prototype["do"] = function(e) {
      this.goTo(parseInt($(e.target).closest('.agenda-tab').attr('data-id')));
      return this;
    };

    TabSlide.prototype.setControls = function() {
      this.$controls = this.children('.agenda-tabs').find('.agenda-tab');
      this.$previous = this.$controls.children('.previous, .first');
      this.$next = this.$controls.children('.next, .last');
      return this;
    };

    TabSlide.prototype.setSizes = function() {
      this.$slides.width(this.$screen.width());
      this.$slider.width(this.getSliderWidth());
      return this;
    };

    return TabSlide;

  })(Slide);

}).call(this);

//# sourceMappingURL=in_agendaWeek.js.map
