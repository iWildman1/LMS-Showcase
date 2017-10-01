var tabContent = null;

(function() {
    var tabButtons = document.querySelectorAll('.btn-tab');
    tabContent = document.querySelectorAll('.tab-data');

    if (tabButtons) {
        for (var i = 0; i < tabButtons.length; i++) {
            tabButtons[i].addEventListener('click', function() {
                handleTabClick(this);
            })
        }
    }

    if (tabContent) {
        tabContent[0].classList.add('tab-data-active')
    }

})();

function handleTabClick(caller) {
    var activeTab = document.querySelector('.tab-active');
    if (activeTab) {
        activeTab.classList.remove('tab-active');
        caller.classList.add('tab-active');
        var tabSearchId = caller.dataset.tabid;

        changeTab(tabSearchId);
    }
};

function changeTab(targetId) {
    for (var i = 0; i < tabContent.length; i++) {
        if (tabContent[i].dataset.tabid == targetId) {
            tabContent[i].classList.add('tab-data-active')
        } else if (tabContent[i].dataset.tabid != targetId && tabContent[i].classList.contains('tab-data-active')) {
            tabContent[i].classList.remove('tab-data-active');
        }
    }
}
