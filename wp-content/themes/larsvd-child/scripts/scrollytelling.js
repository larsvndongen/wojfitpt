jQuery(document).ready(function ($) {
  gsap.registerPlugin(ScrollTrigger);

  // Select all elements with class "container"
  let scenes = document.querySelectorAll(".gsap-container");

  scenes.forEach((scene) => {
    // Select all elements with class "horizontal" within each "container"
    let container = scene.querySelectorAll(".horizontal");

    container.forEach((container) => {
      // Select all elements with class "slide" within each "horizontal" container
      let sections = gsap.utils.toArray(container.querySelectorAll(".slide"));

      // Create a timeline for the animation
      let timeline = gsap.timeline({
        scrollTrigger: {
          pin: scene, // Change this to 'scene' instead of '.container'
          markers: false,
          scrub: true,
          trigger: container,
          snap: 1 / (container.scrollWidth - document.documentElement.clientWidth),
          invalidateOnRefresh: true,
          start: () => "center 50%",
          end: () => "+=" + (container.scrollWidth - document.documentElement.clientWidth) * 1.5, // Use a function for end property
          onUpdate: self => {
            // Calculate the progress percentage
            const progress = self.progress * 100;
          
            // Update the progress bar fill based on the scroll progress
            gsap.to(".progress-fill", { width: progress + "%" });
          }
        },
      });

      // Animation to move the slides horizontally
      timeline.to(
        sections,
        {
          x: () => -(container.scrollWidth - document.documentElement.clientWidth) + "px",
          duration: 1,
          ease: "none",
        },
        0
      );

      timeline.to({}, { duration: 0 });
    });
  });

  // Get the number of slides
  var numSlides = jQuery('.row.larsvd.text-image-gsap .gsap-container .block.repeater .slide').length;
  var slideAmount = numSlides * 100;
  

  // Get the progress bar element
  var progressBar = jQuery('.row.larsvd.text-image-gsap .block.progress .custom-row-container');

  // Create progress balls
  // for (var i = 0; i < numSlides; i++) {
  //   var progressBall = jQuery('<div></div>').addClass('progress-ball progress-' + (i + 1));
  //   progressBar.append(progressBall);
  // }

  // Calculate the left position percentage for each progress ball
  var leftPercentage = 100 / (numSlides - 1); // Subtract 1 to exclude the start and end positions

  // Set the left position for each progress ball
  jQuery('.row.larsvd.text-image-gsap .block.progress article').each(function (index) {
    var left = index === 0 ? 0 : index * leftPercentage; // Set 0% for the first ball, calculate position for the rest
    jQuery(this).css('left', left + '%');
  });

  // gsap.to(".row.larsvd.text-image-gsap .progress-group", {
  //   scrollTrigger: {
  //     trigger: ".gsap-container",
  //     start: "top top",
  //     end: "bottom bottom",
  //     pin: true,
  //     pinSpacing: false,
  //     scrub: true,
  //   }
  // });

});
