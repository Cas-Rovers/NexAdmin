export class Toast {
    constructor(config) {
        this.config = {
            type: config.type || 'info',
            title: config.title || '',
            message: config.message || '',
            icon: this.getIcon(config.type) || '', // Automatically select icon based on type
        };

        this.toastElement = null;
        this.progressElement = null;

        this.render();
        this.show();
        this.autoClose();
    }

    getIcon(type) {
        const iconMap = {
            success: 'fa-check-circle',
            info: 'fa-info-circle',
            warning: 'fa-exclamation-triangle',
            danger: 'fa-exclamation-circle',
            default: 'fa-info-circle'
        };

        // Return icon class based on the type, or default if not found
        return iconMap[type] || iconMap['default'];
    }

    render() {
        this.toastElement = $(`
            <div class="toast bg-${this.config.type} text-white z-2 position-fixed top-0 end-0 m-3 fade">
                <div class="toast-body rounded-3 d-flex">
                    <div class="row">
                        <div class="col-1 text-center d-flex align-items-center p-0 mx-3 my-2 fs-4 lh-1">
                            <i class="fas fa-xl ${this.config.icon} me-2 my-2"></i>
                        </div>
                        <div class="col-auto my-auto">
                            <p class="fw-bold m-0 p-0 lh-1">${this.config.title}</p>
                            <span>${this.config.message}</span>
                        </div>
                    </div>
                    <div class="ms-auto text-white">
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                </div>
                <div class="toast-progress"></div> <!-- Progress bar element -->
            </div>
        `);

        $('body').append(this.toastElement);

        this.progressElement = this.toastElement.find('.toast-progress');
        this.progressElement.css({
            height: '0.25rem',
            width: '100%',
            backgroundColor: 'rgba(255, 255, 255, 0.5)'
        });

        // Attach event listener to close button
        this.toastElement.find('.btn-close').on('click', () => {
            this.hide();
        });
    }

    show() {
        this.toastElement.addClass('show');
    }

    hide() {
        this.toastElement.removeClass('show');
        setTimeout(() => {
            this.toastElement.remove();
        }, 500); // Wait for the fade-out transition to complete before removing the element
    }

    autoClose() {
        const duration = 3000; // Total duration for auto closing
        const increment = 10; // Increment interval for updating progress bar
        let currentTime = 0;
        let progressBarInterval;

        const updateProgressBar = () => {
            currentTime += increment;
            const progress = (currentTime / duration) * 100;
            this.progressElement.css('width', `${progress}%`);
            this.progressElement.attr('aria-valuenow', progress); // Update ARIA attribute for screen readers

            if (currentTime >= duration) {
                clearInterval(progressBarInterval);
                this.hide();
            }
        };

        const startProgressBar = () => {
            progressBarInterval = setInterval(updateProgressBar, increment);
            updateProgressBar(); // Initial call to update progress bar immediately
        };

        startProgressBar();

        // Pause progress bar and auto-close on mouse hover
        this.toastElement.on('mouseenter', () => {
            clearInterval(progressBarInterval);
            this.progressElement.css('transition', 'none'); // Pause transition effect
        });

        // Resume progress bar and auto-close on mouse leave
        this.toastElement.on('mouseleave', () => {
            startProgressBar();
            this.progressElement.css('transition', ''); // Resume transition effect
        });
    }
}

export function showToast(type, title, message = '') {
    new Toast({ type, title, message });
}
