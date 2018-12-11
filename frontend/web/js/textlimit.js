$(document).ready(function(){
        function truncateText(selector, maxLength) {
            var element = document.querySelector(selector),
                truncated = element.innerText;

            if (truncated.length > maxLength) {
                truncated = truncated.substr(0,maxLength) + '...';
            }
            return truncated;
        }

    document.querySelector('h2').innerText = truncateText('h2', 14);
    document.querySelector('h3').innerText = truncateText('h3', 14);
});