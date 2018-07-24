<style type="text/css">
    .is-loading {
        background-color: rgb(35, 35, 35);
        transform: perspective(1400px) matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        transform-style: preserve-3d;
    }

    .loader-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 200px;
    }

    .loader-logo_image {
        position: relative;
        width: 100%;
    }

    .loader-logo_image-background {
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        position: absolute;
        background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJsAAAAjCAYAAACD+HiUAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQyIDc5LjE2MDkyNCwgMjAxNy8wNy8xMy0wMTowNjozOSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjMxRkE5QzYxRTNBMTFFOEJGQ0ZFRUJERjRGOUMxMkMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjMxRkE5QzUxRTNBMTFFOEJGQ0ZFRUJERjRGOUMxMkMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkJEQjM2OUJCMTVBNDExRThCMzM0QTREQjc1QUJFOTNEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkJEQjM2OUJDMTVBNDExRThCMzM0QTREQjc1QUJFOTNEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+vQwaQQAAB3dJREFUeNrsXHtsFkUQ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") 0% 0% / cover;
        opacity: 0;
    }

    .loader-logo_image::before {
        display: block;
        content: "";
        padding-bottom: 22.58%;
    }

    .loader-logo_bar1,
    .loader-logo_bar2,
    .loader-logo_bar3 {
        display: block;
        position: absolute;
        height: 100%;
        width: 4.35%;
        top: 0px;
        left: 50%;
    }

    .loader-logo_bar1 {
        background: rgb(16, 72, 97);
        top: 0px;
        width: 4.35%;
        height: 100%;
        opacity: 1;
        margin-left: 0%;
        left: 0%;
    }

    .loader-logo_bar2 {
        background: rgb(5, 134, 154);
        opacity: 1;
        left: 0%;
        margin-left: 6%;
    }

    .loader-logo_bar3 {
        background: rgb(213, 151, 45);
        transform-style: preserve-3d;
        transform: scale3d(1, 1, 1);
        opacity: 1;
        left: 0%;
        margin-left: 12%;
    }

    @keyframes gwd-gen-6lwzgwdanimation_gwd-keyframes {
        0% {
            top: 0px;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        6.9% {
            top: 0px;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        13.79% {
            top: -40%;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        20.69% {
            top: 0%;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        27.59% {
            top: 0px;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        34.48% {
            top: -40%;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        41.38% {
            top: 0%;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        48.28% {
            top: 0px;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        55.17% {
            top: -40%;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-in-out;
        }
        62.07% {
            top: 0%;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: ease-out;
        }
        82.76% {
            top: 0%;
            width: 4.35%;
            margin-left: 0%;
            animation-timing-function: linear;
        }
        86.21% {
            top: 0%;
            width: 100%;
            margin-left: 0%;
            animation-timing-function: ease-in;
        }
        93.1% {
            top: 0%;
            width: 100%;
            margin-left: 0%;
            animation-timing-function: ease-in;
        }
        100% {
            top: 0%;
            width: 0%;
            margin-left: 100%;
            animation-timing-function: linear;
        }
    }

    .is-loading .loader-logo_image .gwd-gen-6lwzgwdanimation {
        animation: gwd-gen-6lwzgwdanimation_gwd-keyframes 2.9s linear 0s 1 normal forwards;
    }

    @keyframes gwd-gen-r5uigwdanimation_gwd-keyframes {
        0% {
            top: 0px;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        10.34% {
            top: 0%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        17.24% {
            top: -40%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        24.14% {
            top: 0%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        31.03% {
            top: 0%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        37.93% {
            top: -40%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        44.83% {
            top: 0%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        51.72% {
            top: 0%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        58.62% {
            top: -40%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-in-out;
        }
        65.52% {
            top: 0%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: ease-out;
        }
        82.76% {
            top: 0%;
            width: 4.35%;
            margin-left: 6%;
            animation-timing-function: linear;
        }
        86.21% {
            top: 0%;
            width: 100%;
            margin-left: 0%;
            animation-timing-function: linear;
        }
        89.66% {
            top: 0%;
            width: 100%;
            margin-left: 0%;
            animation-timing-function: ease-in;
        }
        100% {
            top: 0%;
            width: 0%;
            margin-left: 100%;
            animation-timing-function: linear;
        }
    }

    .is-loading .loader-logo_image .gwd-gen-r5uigwdanimation {
        animation: gwd-gen-r5uigwdanimation_gwd-keyframes 2.9s linear 0s 1 normal forwards;
    }

    @keyframes gwd-gen-1effgwdanimation_gwd-keyframes {
        0% {
            opacity: 0;
            animation-timing-function: linear;
        }
        96.15% {
            opacity: 0;
            animation-timing-function: linear;
        }
        100% {
            opacity: 1;
            animation-timing-function: linear;
        }
    }

    .is-loading .loader-logo_image .gwd-gen-1effgwdanimation {
        animation: gwd-gen-1effgwdanimation_gwd-keyframes 2.6s linear 0s 1 normal forwards;
    }

    @keyframes gwd-gen-qbl1gwdanimation_gwd-keyframes {
        0% {
            top: 0px;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        13.79% {
            top: 0%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        20.69% {
            top: -40%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        27.59% {
            top: 0%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        34.48% {
            top: 0%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        41.38% {
            top: -40%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        48.28% {
            top: 0%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        55.17% {
            top: 0%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        62.07% {
            top: -40%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-in-out;
        }
        68.97% {
            top: 0%;
            margin-left: 12%;
            width: 4.35%;
            animation-timing-function: ease-out;
        }
        75.86% {
            top: 0%;
            margin-left: 0%;
            width: 4.35%;
            animation-timing-function: ease-out;
        }
        86.21% {
            top: 0%;
            margin-left: 0%;
            width: 100%;
            animation-timing-function: ease-in;
        }
        100% {
            top: 0%;
            margin-left: 100%;
            width: 0%;
            animation-timing-function: linear;
        }
    }

    .is-loading .loader-logo_image .gwd-gen-qbl1gwdanimation {
        animation: gwd-gen-qbl1gwdanimation_gwd-keyframes 2.9s linear 0s 1 normal forwards;
        transition: animation 0ms linear 0ms;
    }

    .loader-backdrop {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        z-index: -1;
        position: fixed;
        background-color: rgb(35, 35, 35);
        transition: opacity 400ms ease-out, z-index 0ms linear 400ms;
    }
    
    .is-loading .loader-backdrop {
        opacity: 1;
        z-index: 9999;
        transition: opacity 400ms ease-out, z-index 0ms linear;
    }
    
</style>
<div class="js-preloader-template">
    <div class="loader-backdrop">
        <div class="loader-logo">
            <div class="loader-logo_image">
                <div class="loader-logo_image-background gwd-gen-1effgwdanimation"></div>
                <div class="loader-logo_bar1 gwd-gen-6lwzgwdanimation"></div>
                <div class="loader-logo_bar2 gwd-gen-r5uigwdanimation"></div>
                <div class="loader-logo_bar3 gwd-gen-qbl1gwdanimation"></div>
            </div>
            <div class="loader-logo_loader">
                <div class="loader-logo_loader-bar2"></div>
                <div class="loader-logo_loader-bar3"></div>
                <div class="loader-logo_loader-bar4"></div>
                <div class="loader-logo_loader-bar"></div>
            </div>
        </div>
    </div>
</div>