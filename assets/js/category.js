document.addEventListener('DOMContentLoaded', function() {
    const categoryHeaders = document.querySelectorAll('.category-header, .category-header-dvd');

    categoryHeaders.forEach(header => {
        header.addEventListener('click', function() {
            
            const contentId = this.classList.contains('category-header-dvd') ? 'dvd-cate' : 'livre-cate';
            const content = document.getElementById(contentId);
            content.classList.toggle('active');

            const arrow = this.querySelector('.arrow');
            arrow.classList.toggle('active');

       
            categoryHeaders.forEach(otherHeader => {
                if (otherHeader !== this) {
                    const otherId = otherHeader.classList.contains('category-header-dvd') ? 'dvd-cate' : 'livre-cate';
                    const otherContent = document.getElementById(otherId);
                    const otherArrow = otherHeader.querySelector('.arrow');
                    if (otherContent) {
                        otherContent.classList.remove('active');
                    }
                    if (otherArrow) {
                        otherArrow.classList.remove('active');
                    }
                }
            });
        });
    });
});


