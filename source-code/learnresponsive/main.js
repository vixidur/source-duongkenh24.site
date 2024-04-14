document.addEventListener("DOMContentLoaded", function () {
    const btnLeft = document.querySelector(".left-btn");
    const tabMenu = document.querySelector(".tab-menu");
    const btnRight = document.querySelector(".right-btn");

    let clickedRight = false; // Biến để theo dõi xem đã nhấp vào btnRight hay chưa

    const iconVisibility = () => {
        let scrollLeftValue = Math.ceil(tabMenu.scrollLeft);
        let scrollableWidth = tabMenu.scrollWidth - tabMenu.clientWidth;

        // Hiển thị hoặc ẩn nút btnLeft
        btnLeft.style.display = (scrollLeftValue > 0 || clickedRight) ? "block" : "none";

        // Hiển thị hoặc ẩn nút btnRight
        btnRight.style.display = scrollableWidth > scrollLeftValue ? "block" : "none";
    };


    // Gọi hàm iconVisibility ban đầu
    iconVisibility();

    btnRight.addEventListener("click", function () {
        tabMenu.scrollLeft += 150;
        setTimeout(iconVisibility, 50);
        clickedRight = true; // Gán clickedRight thành true khi nhấp vào btnRight
    });

    btnLeft.addEventListener("click", function () {
        tabMenu.scrollLeft -= 150;
        setTimeout(iconVisibility, 50);
    });

    // Bắt sự kiện khi kích thước của tab menu thay đổi
    window.addEventListener("resize", function () {
        // Gọi lại hàm iconVisibility khi kích thước thay đổi
        iconVisibility();
    });

    // Xử lý sự kiện khi toàn bộ nội dung đã được tải
    window.onload = function () {
        btnRight.style.display = tabMenu.scrollWidth > tabMenu.clientWidth || tabMenu.scrollWidth >= window.innerWidth ? "block" : "none";
        btnLeft.style.display = tabMenu.scrollWidth >= window.innerWidth ? "" : "none";
    };

    // Xử lý sự kiện khi kích thước của cửa sổ thay đổi
    window.onresize = function () {
        btnRight.style.display = tabMenu.scrollWidth > tabMenu.clientWidth || tabMenu.scrollWidth >= window.innerWidth ? "block" : "none";
        btnLeft.style.display = tabMenu.scrollWidth >= window.innerWidth ? "" : "none";

        let scrollLeftValue = Math.round(tabMenu.scrollLeft);
        btnLeft.style.display = scrollLeftValue > 0 ? "block" : "none";
    };
    let activeDrag = false;

    tabMenu.addEventListener("mousemove", (drag) => {
        if (!activeDrag) return;
        tabMenu.scrollLeft -= drag.movementX;
        iconVisibility();
        tabMenu.classList.add("dragging");
    });

    document.addEventListener("mouseup", () => {
        activeDrag = false;
        tabMenu.classList.remove("dragging");
    });

    tabMenu.addEventListener("mousedown", () => {
        activeDrag = true;
    });

    //JS xem cac tab content khi click button
    const tabs = document.querySelectorAll(".tab");
    const tabBtns = document.querySelectorAll(".tab-btn");

    const tab_Nav = function (tabBtnClick) {
        tabBtns.forEach((tabBtn) => {
            tabBtn.classList.remove("active");
        });

        tabs.forEach((tab) => {
            tab.classList.remove("active");
        });

        tabBtns[tabBtnClick].classList.add("active");
        tabs[tabBtnClick].classList.add("active");
    }
    tabBtns.forEach((tabBtn, i) => {
        tabBtn.addEventListener("click", () => {
            tab_Nav(i);
        });
    });
});


digo.src("api.json").pipe("digo-api");
digo.src("api.json").pipe("digo-api"), {
    init: null, //  初始化原始数据库。
    mockData: null, // 自定义个别字段的模拟数据。
    mockCount: null, // 自定义个别字段的模拟数据。
    mock: null, // 模拟数据文件夹地址。
    merge: true, // 是否合并已有的模拟数据。
    maxDepth: 3, // 嵌套对象的最多模拟次数。
    mockPrefix: "", // 模拟数据的前缀。
    ts: null, // 接口文件夹地址。
    ajaxModule: null, // 设置 AJAX 模块地址。
    successDescription: "The request callback when succeed.", // 成功回调的描述。
    errorDescription: "The request callback when error occurs.", // 失败回调的描述。
    dataProperty: null, // 设置数据字段。
    messageProperty: null, // 设置信息字段。
    doc: null, // 生成的文档文件名。
    generate: null, // 自定义生成函数。

};