/**
 * hàm truyền obj để tạo notice
 * @param {obj} param0 message, type, duration
 */
 function notice({
    message = '',
    type = 'info',
    duration = 4000
}) {
    const main = document.getElementById('notice');
    if(main) 
    {
        const notice = document.createElement('div');
        
        const autoRemoveNotice = setTimeout(function() 
        {
            main.removeChild(notice);
        }, duration + 2000);

        notice.onclick = function(e) {
            if(e.target.closest('.notice-close')) 
            {
                main.removeChild(notice); 
                clearTimeout(autoRemoveNotice);
            }
        }

        notice.classList.add('notice', `notice-${type}`);
        const delay = (duration - duration % 1000) / 1000;
        notice.style.animation = `slideInLeft ease 1s, fadeOut linear 1s ${delay}s forwards`;

        const icons = {
            success: 'fas fa-check-circle',
            info: 'fas fa-info-circle',
            warning: 'fas fa-exclamation-circle',
            error: 'fas fa-exclamation-triangle'
        }
        const icon = icons[type];
        notice.innerHTML = ` 
                                <div class="notice-icon">
                                    <i class="${icon}"></i>
                                </div>
                                <div class="notice-body">
                                    <p class="notice-msg">${message}</p>
                                </div>
                                <div class="notice-close">
                                    <i class="fas fa-times"></i>
                                </div>
                            `;
        main.appendChild(notice);
    }
}