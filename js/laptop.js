document.addEventListener("DOMContentLoaded", function () {
    const preview = document.getElementById("carPreview");
    const previewImage = document.getElementById("previewImage");
    const previewName = document.getElementById("previewName");
    const previewPrice = document.getElementById("previewPrice");
    const previewCategory = document.getElementById("previewCategory");
    const rentButton = document.getElementById("rentButton");
    const previewClose = document.getElementById("previewClose");
  
    // Show preview
    document.querySelectorAll(".car-card").forEach(card => {
        card.addEventListener("click", function () {
            const imageSrc = this.querySelector("img").src;
            const name = this.querySelector("h3").innerText;
            const price = this.querySelector("p:nth-of-type(1)").innerText.split(": ")[1];
            const category = this.querySelector("p:nth-of-type(2)").innerText.split(": ")[1];
  
            previewImage.src = imageSrc;
            previewName.innerText = name;
            previewPrice.innerText = `Price: ${price}`;
            previewCategory.innerText = `Category: ${category}`;
  
            preview.style.display = "block";
  
            // Attach car data to the rent button
            rentButton.setAttribute("data-name", name);
            rentButton.setAttribute("data-price", price);
            rentButton.setAttribute("data-category", category);
            rentButton.setAttribute("data-image", imageSrc);
        });
    });
  
    // Close preview
    previewClose.addEventListener("click", () => (preview.style.display = "none"));
  
    window.addEventListener("click", (event) => {
        if (event.target === preview) {
            preview.style.display = "none";
        }
    });
  
    // Redirect to carconfirm.php on Rent button click
    rentButton.addEventListener("click", function () {
        const name = encodeURIComponent(this.getAttribute("data-name"));
        const price = encodeURIComponent(this.getAttribute("data-price"));
        const category = encodeURIComponent(this.getAttribute("data-category"));
        const image = encodeURIComponent(this.getAttribute("data-image"));
  
        const url = `laptopconfirm.php?name=${name}&price=${price}&category=${category}&image=${image}`;
        window.location.href = url;
    });
  });
  