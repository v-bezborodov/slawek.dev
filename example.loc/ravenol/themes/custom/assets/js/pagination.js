	// pagination
	$(function() {

		(function ($) {
			$.fn.extend({
				mgPgnation: function (options) {

					var $curNav, $magicLine, $magicNav, $mainNav, $nextNav, $pgnNav, $prevNav, $prevNavText, $this, calPgnWidth, magicDraw, prevNavWidth, prevText, showPrevNext, updatePrevText;
					$this = $(this);
					if ($this.length) {
						$mainNav = this.children();
						$pgnNav = $this.find('.pgn__item');
						$curNav = $this.find('.current');
						$magicNav = $this.find('a');
						$prevNav = $this.find('.prev');
						$nextNav = $this.find('.next');
						$prevNavText = $prevNav.find('.pgn__prev-txt');

						calPgnWidth = function () {
							var pgnWidth, prevWidth, vsbNav, vsbNavs;
							vsbNav = $this.find('.pgn__item a:visible').length + 1;
							vsbNavs = vsbNav + 2;
							prevWidth = 100 / vsbNavs;
							pgnWidth = 100 - prevWidth * 2;
							$prevNav.css('width', prevWidth + '%');
							$nextNav.css('width', prevWidth + '%');
							$pgnNav.css('width', pgnWidth + '%');
							return $pgnNav.find('a, strong').css('width', 100 / vsbNav + '%');
						};
						magicDraw = function () {
							$magicLine.width($curNav.width());
							if ($curNav.position() !== void 0) {
								$magicLine.css('left', $curNav.position().left);
							}
							$magicLine.data('origLeft', $magicLine.position().left);
							return $magicLine.data('origWidth', $magicLine.width());
						};
						$mainNav.append('<li class="pgn__magic-line">');
						$magicLine = $this.find('.pgn__magic-line');
						calPgnWidth();
						magicDraw();
						$magicNav.hover(function () {
							var $el, leftPos, newWidth;
							$el = $(this);
							leftPos = $el.position().left;
							newWidth = $el.width();
							return $magicLine.stop().animate({
								left: leftPos,
								width: newWidth });
						}, function () {
							return $magicLine.stop().animate({
								left: $magicLine.data('origLeft'),
								width: $magicLine.data('origWidth') });
						});
						return window.addEventListener('resize', function () {
							calPgnWidth();
							return magicDraw();
						});
					}
				} });
			return $('.pgn').mgPgnation();
		})(jQuery);

	}).call(this);
	