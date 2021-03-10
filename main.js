var updateButtons = $("button[name=update]")
var deleteButtons = $("button[name=delete]");

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
	var book = $("div[id=" + str + "]")
	book.remove();
	// send post request to delete_book.php 

	
}

updateButtons.on("click", redirectToUpdatePage);
deleteButtons.on("click", deleteBook);