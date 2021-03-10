var updateButtons = $("button[name=update]")
var deleteButtons = $("button[name=delete]");
var addButton = $("#add");
var overlay = $("#overlay");
var form = $("#overlay #inner form");

function redirectToUpdatePage() { 
	window.location.href = "/update_book.php?id=" + $(this).val();
}

function deleteBook() {
	var str = $(this).val();
	$.ajax({
		url: "/delete_book.php",
		type: "POST",
		dataType: "json",
		data: {id: str},
		success:function(result){
                console.log(result);
		}
	});

	// remove book component from DOM
	var book = $("article[id=" + str + "]")
	book.remove();
	// send post request to delete_book.php 

	
}

function displayOverlay() {
	overlay.css("display", "flex");
}

function hideOverlay() {
	overlay.css("display", "none");
}

updateButtons.on("click", redirectToUpdatePage);
deleteButtons.on("click", deleteBook);
addButton.on("click", displayOverlay);
form.on("submit", hideOverlay);