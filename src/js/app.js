var $ = require('jquery');

$(document).ready(function() {

    var slug = $('.post').data('slug');

    $.ajax({
        url: 'http://localhost/Boolean/php-boolpress/comments.php',
        method: 'GET',
        data: {
            slug: slug
        },
        success: function(data)
        {
            var results = JSON.parse(data);

            printResults(results);
        },
        error: function()
        {
            alert('Si è verificato un errore');
        }
    });

});

function printResults(results)
{
    for (var i = 0; i < results.length; i++) {
        var comment = results[i];

         var template = $('.templates .comment-template').clone();

         template.find('.name').text(comment.name);
         template.find('.mail').text(comment.email);

         template.find('p').text(comment.body);

         $('.post').append(template.html());
    }
}
