document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    let currentIndex = 0;
    let isDragging = false;
    let startX;
    let currentTranslate = 0;
  
    function nextSlide() {
      currentIndex = (currentIndex + 1) % slider.children.length;
      updateSlider();
    }
  
    function updateSlider() {
      const translateValue = -currentIndex * 100 + "%";
      slider.style.transform = "translateX(" + translateValue + ")";
      currentTranslate = -currentIndex * 100;
    }
  
    function handleMouseDown(e) {
      isDragging = true;
      startX = e.clientX;
    }
  
    function handleMouseMove(e) {
      if (!isDragging) return;
  
      const currentX = e.clientX;
      const diffX = currentX - startX;
      slider.style.transform = "translateX(" + (currentTranslate + diffX) + "px)";
    }
  
    function handleMouseUp(e) {
      if (isDragging) {
        const diffX = e.clientX - startX;
        const threshold = 50; // Adjust this value as needed
  
        if (diffX > threshold) {
          currentIndex = Math.max(0, currentIndex - 1);
        } else if (diffX < -threshold) {
          currentIndex = Math.min(currentIndex + 1, slider.children.length - 1);
        }
  
        updateSlider();
      }
  
      isDragging = false;
    }
  
    // Set interval for automatic sliding
    setInterval(nextSlide, 3000); // Change 3000 to the desired interval in milliseconds
  
    // Add mouse event listeners for manual sliding
    slider.addEventListener("mousedown", handleMouseDown);
    slider.addEventListener("mousemove", handleMouseMove);
    slider.addEventListener("mouseup", handleMouseUp);
  
    // Prevent text selection during dragging
    slider.addEventListener("selectstart", function (e) {
      e.preventDefault();
    });
  });
  