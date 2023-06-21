$(document).ready(function () {
    // Event listener for minus button
    $(".btn-minus").click(function () {
        var productId = $(this).data("product-id");
        var inputNumber = $("#input-number-" + productId);
        var currentValue = parseInt(inputNumber.val());

        if (currentValue > 0) {
            inputNumber.val(currentValue - 1);
            updateOrderTable(productId, currentValue - 1);
            updateTotalPrice();
        }
    });

    // Event listener for plus button
    $(".btn-plus").click(function () {
        var productId = $(this).data("product-id");
        var inputNumber = $("#input-number-" + productId);
        var currentValue = parseInt(inputNumber.val());

        inputNumber.val(currentValue + 1);
        updateOrderTable(productId, currentValue + 1);
        updateTotalPrice();
    });

    // Update the order table with selected items and quantities
    function updateOrderTable(productId, quantity) {
        var menuName = $("#input-number-" + productId)
            .closest(".card")
            .find(".card-title")
            .text();
        var menuPrice = parseInt(
            $("#input-number-" + productId)
                .closest(".card")
                .find(".card-footer span")
                .text()
                .replace("Rp", "")
        );
        var tableRow = $("#order-table-body").find(
            'tr[data-product-id="' + productId + '"]'
        );

        if (quantity > 0) {
            var totalPrice = menuPrice * quantity;

            if (tableRow.length === 0) {
                // Add new row to the table
                var newRow = $('<tr data-product-id="' + productId + '"></tr>');
                newRow.append("<td>" + menuName + "</td>");
                newRow.append("<td>" + quantity + "</td>");
                newRow.append("<td>" + totalPrice + "</td>");
                $("#order-table-body").append(newRow);
            } else {
                // Update existing row in the table
                tableRow.find("td:nth-child(2)").text(quantity);
                tableRow.find("td:nth-child(3)").text(totalPrice);
            }
        } else {
            // Remove row from the table
            tableRow.remove();
        }
    }

    // Update the total price
    function updateTotalPrice() {
        var totalPrice = 0;
        $("#order-table-body tr").each(function () {
            var price = parseInt($(this).find("td:nth-child(3)").text());
            totalPrice += price;
        });
        $("#total-price").text("Rp" + totalPrice);
    }

    // Process order when the order button is clicked
    $("#order-btn").click(function () {
        var orderItems = [];
        $("#order-table-body tr").each(function () {
            var productId = $(this).data("product-id");
            var quantity = parseInt($(this).find("td:nth-child(2)").text());
            orderItems.push({ menu_id: productId, quantity: quantity });
        });

        if (orderItems.length > 0) {
            // Ambil token CSRF
            // var csrfToken = document
            //     .querySelector('meta[name="csrf-token"]')
            //     .getAttribute("content");

            $.ajax({
                url: "/order",
                // Ubah sesuai dengan URL rute 'order.store' yang valid
                type: "POST",
                data: { order_items: orderItems },
                dataType: "json",
                // contentType: "application/json",
                // beforeSend: function (xhr) {
                //     // Setel header CSRF token sebelum permintaan dikirim
                //     xhr.setRequestHeader("X-CSRF-Token", csrfToken);
                // },
                success: function (response) {
                    alert(response.message); // Menampilkan alert dengan pesan sukses
                    location.reload(); // Melakukan reload halaman
                    // Handle success response here
                },
                error: function (error) {
                    console.log(error);
                    // Handle error response here
                },
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var categoryButtons = document.querySelectorAll(".btn-outline-primary");

    categoryButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var category = button.getAttribute("data-category");

            var cards = document.querySelectorAll(".card-container");
            cards.forEach(function (card) {
                if (category === "all" || card.classList.contains(category)) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });

    searchInput.addEventListener("input", function () {
        var searchValue = searchInput.value.toLowerCase().trim();

        var cards = document.querySelectorAll(".card-container");
        cards.forEach(function (card) {
            var menuName = card
                .querySelector(".card-title")
                .textContent.toLowerCase();
            if (menuName.includes(searchValue)) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const datePicker = document.getElementById("datePicker");
    const table = document.getElementById("table1");

    flatpickr(datePicker, {
        dateFormat: "l, d-m-Y",
        onChange: function (selectedDates, dateStr) {
            const selectedDate = selectedDates[0];
            const rows = table
                .getElementsByTagName("tbody")[0]
                .getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                const dateCell = rows[i].getElementsByTagName("td")[2];
                const orderDate = dateCell.textContent.trim();

                if (
                    !selectedDate ||
                    orderDate === selectedDate.toLocaleDateString("en-US")
                ) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        },
    });
});
