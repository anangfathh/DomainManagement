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
});
