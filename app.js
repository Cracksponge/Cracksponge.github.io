function sendComment() {

    var comment = document.getElementById('userComment').value;

    var email = document.getElementById('userEmail').value;


    if (!comment || !email) {

        alert('Please fill in both the comment and email fields.');

        return;

    }


    alert('Comment submitted successfully!');


    // Optionally, reset the form

    document.getElementById('commentForm').reset();

}

