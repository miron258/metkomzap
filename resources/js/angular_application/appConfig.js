ngApp.config(['modalConfig', 'uiMask.ConfigProvider', function (modalConfig, uiMaskConfigProvider) {
        //Config Plugin V-Modal
        modalConfig.containerSelector = 'body';

//Config UI MASK
        uiMaskConfigProvider.maskDefinitions({'A': /[a-z]/, '*': /[a-zA-Z0-9]/});
        uiMaskConfigProvider.clearOnBlur(false);
        uiMaskConfigProvider.eventsToHandle(['input', 'keyup', 'click']);




    }]);