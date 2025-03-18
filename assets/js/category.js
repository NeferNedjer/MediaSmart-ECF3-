document.addEventListener('DOMContentLoaded', function() {
    
    const categoryHeaders = document.querySelectorAll('.category-header, .category-header-dvd');
    const authorHeader = document.querySelector('#author-cate h3');
    const authorContent = document.querySelector('.author-hidden');
    const authorArrow = authorHeader.querySelector('.arrow');

    if (authorHeader && authorContent) {
      
        authorContent.style.maxHeight = '0px';
        authorContent.style.overflow = 'hidden';

        authorHeader.addEventListener('click', function() {
            
            if (authorContent.style.maxHeight === '0px') {
                authorContent.style.maxHeight = authorContent.scrollHeight + 'px';
                authorArrow.classList.add('active');
            } else {
                authorContent.style.maxHeight = '0px';
                authorArrow.classList.remove('active');
            }
        });
    }

    
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

   
    const sidebar = document.getElementById('sidebar');
    const closeSidebarBtn = document.querySelector('.close-sidebar');
    
    const showCate = document.querySelector('#show-cate');


    const openSidebarBtn = document.createElement('button');
    openSidebarBtn.classList.add('open-sidebar');
    openSidebarBtn.innerHTML = '☰';
    document.body.appendChild(openSidebarBtn);
    showCate.appendChild(openSidebarBtn) ;
    openSidebarBtn.classList.add('open-sidebar');

    openSidebarBtn.style.display = 'none';

    closeSidebarBtn.addEventListener('click', () => {
        sidebar.style.transform = 'translateX(-100%)';
        openSidebarBtn.style.display = 'block';
    });

    openSidebarBtn.addEventListener('click', () => {
        sidebar.style.transform = 'translateX(0)';
        openSidebarBtn.style.display = 'none';
        
    });
});



