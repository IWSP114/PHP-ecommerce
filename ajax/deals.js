$(document).ready(function () {
    // Send the POST request
    $.ajax({
      url: './utils/deals.php',
      type: 'POST',
      success: function (response) {
        try {
          var data = JSON.parse(response);
          if (data.error) {
            alert('Register failed: ' + data.error);
            $('.error-message').text(data.error)
          } else {
            const data = JSON.parse(response);
            $('.error-message').text(data);
            // Render products dynamically from AJAX response
            let html = '';
            if (Array.isArray(data)) {
                data.forEach(function(product) {
                    const image = `/images/products/${product.ProductID}.jpg`;
                    html += `
                      <div class="deal-card">
                        <img src="${image}" alt="${product.ProductName}" />
                        <h2>${product.ProductName}</h2>
                        <p class="description">${product.Description}</p>
                        <p class="price">
                          <span class="deal-price">$${parseFloat(product.DealPrice).toFixed(2)}</span>
                          <span class="original-price">$${parseFloat(product.Price).toFixed(2)}</span>
                        </p>
                        <form action="addToCart.php" method="post" class="add-to-cart-form">
                          <input type="hidden" name="product_id" value="${product.ProductID}" />
                          <button type="submit">Buy Now</button>
                        </form>
                      </div>
                    `;
                });
            }
            $('.deals-grid').html(html);
          }
        } catch (e) {
          alert('Unexpected response from server.');
          $('.error-message').text(response)
        }
      },
      error: function (jqXHR) {
        let obj;
        try {
          obj = JSON.parse(jqXHR.responseText);
        } catch (e) {
          obj = { error: 'Unknown error occurred.' };
        }
        alert('Failed to submit the form: ' + obj.error);
        $('.error-message').text(obj.error)
      }
    });
    })