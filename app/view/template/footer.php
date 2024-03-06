<footer>
	<div id="footer">
		<div class="row">
			<div class="flex footer-con">
				<div class="logo-holder">
					<a href="home"><img loading="lazy" src="public/images/content/logo.png" alt="Logo"></a>
				</div>
			</div>

			<div class="socials">
				<a href="<?php $this->info('fb_link') ?>" target="_blank"><img loading="lazy" src="public/images/fb.png" alt="facebook"></a>
				<a href="<?php $this->info('ig_link') ?>" target="_blank"><img loading="lazy" src="public/images/ig.png" alt="instagram"></a>
				<a href="<?php $this->info('yt_link') ?>" target="_blank"><img loading="lazy" src="public/images/yt.png" alt="youtube"></a>
				<a href="<?php $this->info('tw_link') ?>" target="_blank"><img loading="lazy" src="public/images/tw.png" alt="twitter"></a>
				<a href="<?php $this->info('gp_link') ?>" target="_blank"><img loading="lazy" src="public/images/gp.png" alt="google"></a>
			</div>


			<div class="copyrights">
				<p class="copy">
					©
					<?php echo date("Y"); ?>.
					<?php $this->info("company_name"); ?>. All Rights Reserved.
					<?php if ($this->siteInfo['policy_link']): ?>
						<a href="<?php $this->info("policy_link"); ?>">Privacy Policy</a>.
					<?php endif ?>
				</p>
				<p class="techno">
					<a href="http://technodreamoutsourcing.com/">Web Design</a> Done by <img loading="lazy"
						src="public/images/hd-logo.png" alt="">
				</p>
			</div>
		</div>
	</div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo URL; ?>public/scripts/sendform.js" data-view="<?php echo $view; ?>" id="sendform"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>  -->
<script src="<?php echo URL; ?>public/scripts/responsive-menu.js"></script>
<script src="https://unpkg.com/sweetalert2@7.20.10/dist/sweetalert2.all.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<script>
	// EFFECTS / ANIMATION
	function reveal() {
		var reveals = document.querySelectorAll(".reveal");

		for (var i = 0; i < reveals.length; i++) {
			var windowHeight = window.innerHeight;
			var elementTop = reveals[i].getBoundingClientRect().top;
			var elementVisible = 150;

			if (elementTop < windowHeight - elementVisible) {
				reveals[i].classList.add("active");
			} else {
				reveals[i].classList.remove("active");
			}
		}
	}

	window.addEventListener("scroll", reveal);

	// HEADER FIXED
	document.addEventListener("DOMContentLoaded", function () {
		var header = document.getElementById("header");
		var logoImg = document.querySelector("#header .logo-holder img");

		function updateHeader() {
			if (window.scrollY > 0) {
				header.classList.add("fixed");
			} else {
				header.classList.remove("fixed");
			}

			// Resize logo image based on scroll position
			var maxImgWidth = 250;
			var scrolledPercentage = Math.min(1, window.scrollY / 100); // You can adjust the factor based on your design
			var newImgWidth = maxImgWidth + (1 - scrolledPercentage) * (logoImg.width - maxImgWidth);
			logoImg.style.maxWidth = newImgWidth + "px";
		}

		// Initial call to set header and image size
		updateHeader();

		window.addEventListener("scroll", function () {
			updateHeader();

			// Check if scroll position is at the top
			if (window.scrollY === 0) {
				// Reset the image size when back at the top
				logoImg.style.maxWidth = "489px"; // Adjust the original max-width value
			}
		});
	});

	// DROPDOWN SERVICES
	function myFunction() {
		var dropdownContent = document.getElementById("myDropdown");
		dropdownContent.classList.toggle("show-down");
	}

	window.onclick = function (e) {
		if (!e.target.matches('.dropbtn')) {
			var dropdowns = document.getElementsByClassName("dropdown-content");
			for (var i = 0; i < dropdowns.length; i++) {
				var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show-down')) {
					openDropdown.classList.remove('show-down');
				}
			}
		}
	}

	// DROPUP FOOTER SERVICES
	function myFunction2() {
		var dropupContent = document.getElementById("myDropup");
		dropupContent.classList.toggle("show-up");
	}

	window.onclick = function (e) {
		if (!e.target.matches('.dropupbtn')) {
			var dropups = document.getElementsByClassName("dropup-content");
			for (var i = 0; i < dropups.length; i++) {
				var openDropup = dropups[i];
				if (openDropup.classList.contains('show-up')) {
					openDropup.classList.remove('show-up');
				}
			}
		}
	}
</script>

<?php if ($this->siteInfo['cookie']): ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
	<script src="<?php echo URL; ?>public/scripts/cookie-script.js"></script>
<?php endif ?>

<?php if (in_array($view, ["home", "contact"])): ?>
	<textarea id="g-recaptcha-response" class="destroy-on-load"></textarea>
	<script src='//www.google.com/recaptcha/api.js?onload=captchaCallBack&render=explicit' async defer></script>
	<script>
		var captchaCallBack = function () {
			$('.g-recaptcha').each(function (index, el) {
				grecaptcha.render(el, { 'sitekey': '6LeWgAkpAAAAAFSpZWANpqUHal-W0bgABjVJveRl' });
			});
		};

		$('.consentBox').click(function () {
			if ($(this).is(':checked')) {
				if ($('.termsBox').length) {
					if ($('.termsBox').is(':checked')) {
						$('.ctcBtn').removeAttr('disabled');
					}
				} else {
					$('.ctcBtn').removeAttr('disabled');
				}
			} else {
				$('.ctcBtn').attr('disabled', true);
			}
		});

		$('.termsBox').click(function () {
			if ($(this).is(':checked')) {
				if ($('.consentBox').is(':checked')) {
					$('.ctcBtn').removeAttr('disabled');
				}
			} else {
				$('.ctcBtn').attr('disabled', true);
			}
		});

	</script>

<?php endif; ?>


<?php if ($view == "gallery"): ?>
	<script type="text/javascript" src="public/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<script type="text/javascript" src="public/scripts/jquery.pajinate.js"></script>
	<script>
		$(document).ready(function () {
			$('#gall1').pajinate({
				num_page_links_to_display: 3,
				items_per_page: 10
			});
			$('.fancy').fancybox({
				helpers: {
					title: {
						type: 'over'
					}
				}
			});
		})
	</script>
<?php endif; ?>


<a class="cta" href="tel:<?php $this->info("phone"); ?>"><span
		style="display: block; width: 1px; height: 1px; overflow: hidden;">Call To Action Button</span></a>

<?php $this->checkSuspensionFooter(); ?>
</body>

</html>