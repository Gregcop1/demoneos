(function() {
  var Slide,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  $(document).on("ready", function() {
    var in_quickAccess;
    if (typeof in_quickAccess === "undefined" || in_quickAccess === null) {
      in_quickAccess = true;
      return $('.quickaccess').each(function() {
        return new Slide(this);
      });
    }
  });

  if (typeof Slide === "undefined" || Slide === null) {
    Slide = (function() {
      Slide.prototype.slideWidth = 145;

      function Slide(el, current) {
        var overflow;
        this.current = current;
        this.refresh = __bind(this.refresh, this);
        this.first = __bind(this.first, this);
        this.next = __bind(this.next, this);
        this.previous = __bind(this.previous, this);
        this.last = __bind(this.last, this);
        this.goTo = __bind(this.goTo, this);
        this["do"] = __bind(this["do"], this);
        if (!this.current) {
          this.current = 0;
        }
        this.setElements(el);
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
        if (index < 0) {
          index = 0;
        } else if (index > this.lastIndex - this.limit) {
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
        this.current = this.lastIndex - this.limit;
        this.checkControls();
        this.$slider.css({
          "margin-left": -this.$slider.width() + this.$screen.width()
        });
        return this;
      };

      Slide.prototype.previous = function() {
        this.goTo(this.current - this.limit + 1);
        return this;
      };

      Slide.prototype.next = function() {
        this.goTo(this.current + this.limit - 1);
        return this;
      };

      Slide.prototype.first = function() {
        this.goTo(0);
        return this;
      };

      Slide.prototype.checkControls = function() {
        if (this.current === 0) {
          this.$previous.addClass("disabled");
        } else {
          this.$previous.removeClass("disabled");
        }
        if (this.current >= this.lastIndex - this.limit) {
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
        this.$slider.width(this.getsliderWidth());
        return this;
      };

      Slide.prototype.getsliderWidth = function() {
        var slideWidth;
        slideWidth = 0;
        this.$slides.each(function() {
          return slideWidth += $(this).outerWidth();
        });
        return slideWidth;
      };

      Slide.prototype.getStatus = function() {
        return this.$slider.width() > this.$screen.width();
      };

      Slide.prototype.setLimit = function(limit) {
        this.limit = limit;
        return this;
      };

      Slide.prototype.getLimit = function() {
        return Math.floor(this.$screen.width() / this.slideWidth);
      };

      Slide.prototype.setElements = function(el) {
        this.el = el;
        this.$el = $(this.el);
        this.$controls = this.find('.control');
        this.$previous = this.find('.previous, .first');
        this.$next = this.find('.next, .last');
        this.$screen = this.find('.screen');
        this.$slider = this.find('.slider');
        this.$slides = this.find('.item');
        return this;
      };

      Slide.prototype.refresh = function() {
        this.setSizes();
        this.setLimit(this.getLimit());
        if (this.getStatus()) {
          this.active = true;
          this.$controls.off("click");
          this.$controls.on("click", this["do"]);
        } else {
          this.active = false;
          this.$controls.off("click");
        }
        return this.checkControls();
      };

      Slide.prototype.find = function(selector) {
        return this.$el.find(selector);
      };

      Slide.prototype.disable = function() {
        this.active = false;
        this.$controls.hide();
        return this.goTo(0);
      };

      Slide.prototype.enable = function() {
        this.active = true;
        this.$controls.show();
        return this.goTo(this.current);
      };

      return Slide;

    })();
  }

}).call(this);

//# sourceMappingURL=quickaccess.js.map
