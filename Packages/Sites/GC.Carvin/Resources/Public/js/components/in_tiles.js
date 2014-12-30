(function() {
  var Tiles,
    __bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  $(document).on("ready", function() {
    return $('.news-list').each(function() {
      return new Tiles(this);
    });
  });

  Tiles = (function() {
    function Tiles(el) {
      this.setOffsets = __bind(this.setOffsets, this);
      this.setElements(el).setOffsets();
      $(window).on("resize", this.setOffsets);
      return this;
    }

    Tiles.prototype.setOffsets = function() {
      var $tile, tile, _i, _len, _ref;
      this.rowLength = this.getRowLength();
      _ref = this.$tiles;
      for (_i = 0, _len = _ref.length; _i < _len; _i++) {
        tile = _ref[_i];
        $tile = $(tile);
        if ($tile.index() > this.rowLength - 1) {
          $tile.css("margin-top", -this.getOffset($tile));
        }
      }
      return this;
    };

    Tiles.prototype.setElements = function(el) {
      this.el = el;
      this.$el = $(this.el);
      this.$tiles = this.find('.news-item');
      return this;
    };

    Tiles.prototype.find = function(selector) {
      return this.$el.find(selector);
    };

    Tiles.prototype.getRowLength = function() {
      return 4;
    };

    Tiles.prototype.getBottom = function($tile) {
      return $tile.position().top + $tile.outerHeight() + parseInt($tile.css("margin-top"));
    };

    Tiles.prototype.getRowIndex = function($tile) {
      if (($tile.index() + 1) % this.rowLength) {
        return ($tile.index() + 1) % this.rowLength;
      } else {
        return this.rowLength - 1;
      }
    };

    Tiles.prototype.getPrevRow = function($tile) {
      var from, to;
      from = this.getRowIndex($tile);
      to = from + this.rowLength;
      return $tile.prevAll().slice(from, to);
    };

    Tiles.prototype.getRowBottom = function($row) {
      var $tile, bottom, max, tile, _i, _len;
      max = 0;
      for (_i = 0, _len = $row.length; _i < _len; _i++) {
        tile = $row[_i];
        $tile = $(tile);
        bottom = this.getBottom($tile);
        if (bottom > max) {
          max = bottom;
        }
      }
      return max;
    };

    Tiles.prototype.getUpsideElement = function($tile) {
      return $($tile.prevAll()[this.rowLength - 1]);
    };

    Tiles.prototype.getOffset = function($tile) {
      var $rowBottom, $upsideElement;
      $rowBottom = this.getRowBottom(this.getPrevRow($tile));
      $upsideElement = this.getBottom(this.getUpsideElement($tile));
      return $rowBottom - $upsideElement;
    };

    return Tiles;

  })();

}).call(this);

//# sourceMappingURL=in_tiles.js.map
