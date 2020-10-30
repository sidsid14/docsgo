<style>
    .tab-content ul {
        list-style: none;
        counter-reset: my-awesome-counter;
    }

    .tab-content ul li {
        counter-increment: my-awesome-counter;
    }

    .tab-content ul li::before {
        content: counter(my-awesome-counter) ". ";
        color: "#6c757d";
        font-weight: bold;
    }

    .nav-link.active {
        color: #f8f9fa !important;
        background-color: #6c757d !important;
    }
</style>


<div class="row  justify-content-center">
    <div class="col-12  col-md-10 col-lg-7">
        <div class="card  mt-2">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active lead" id="enum-tab" data-toggle="tab" href="#enum" role="tab"
                        aria-controls="enum" aria-selected="true">Enums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lead" id="config-tab" data-toggle="tab" href="#config" role="tab"
                        aria-controls="config" aria-selected="false">Config</a>
                </li>
            </ul>
            <div class="tab-content pt-1 pl-3 pr-3" id="myTabContent">
                <div class="tab-pane fade  show active  p-3" id="enum" role="tabpanel" aria-labelledby="enum-tab">
                    <div class="row">
                        <div class="col-12" id="enumAlert">
                            <div class="alertDiv"></div>
                        </div>
                        <div class="col-12 col-sm-4 ">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="document-status-list"
                                    data-toggle="list" href="#documentStatusList" role="tab"
                                    aria-controls="profile">Document Status</a>

                                <a class="list-group-item list-group-item-action" id="reference-category-list"
                                    data-toggle="list" href="#referenceCategoryList" role="tab"
                                    aria-controls="profile">Reference Category</a>

                                <a class="list-group-item list-group-item-action" id="review-category-list"
                                    data-toggle="list" href="#reviewCategoryList" role="tab"
                                    aria-controls="profile">Review Category</a>
                                
                                <a class="list-group-item list-group-item-action" id="risk-category-list"
                                    data-toggle="list" href="#riskCategoryList" role="tab"
                                    aria-controls="profile">Risk Category</a>

                                <a class="list-group-item list-group-item-action " id="template-category-list"
                                    data-toggle="list" href="#templateCategoryList" role="tab"
                                    aria-controls="home">Template Category</a>

                                <a class="list-group-item list-group-item-action" id="user-role-list"
                                    data-toggle="list" href="#userRoleList" role="tab"
                                    aria-controls="profile">User Role</a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 pt-4 pt-sm-0">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="documentStatusList" role="tabpanel"
                                    aria-labelledby="document-status-list">
                                    
                                    <div class="row ">
                                        <div class="col-10">
                                            <ul class="list-group documentStatus"></ul>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary"
                                                onclick="addValue('Document Status', 'documentStatus')">Add</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="referenceCategoryList" role="tabpanel"
                                    aria-labelledby="reference-category-list">
                                    
                                    <div class="row ">
                                        <div class="col-10">
                                            <ul class="list-group referenceCategory"></ul>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary"
                                                onclick="addValue('Reference Category', 'referenceCategory')">Add</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="reviewCategoryList" role="tabpanel"
                                    aria-labelledby="review-category-list">
                                    
                                    <div class="row ">
                                        <div class="col-10">
                                            <ul class="list-group reviewCategory"></ul>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary"
                                                onclick="addValue('Review Category', 'reviewCategory')">Add</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="riskCategoryList" role="tabpanel"
                                    aria-labelledby="risk-category-list">
                                    
                                    <div class="row ">
                                        <div class="col-10">
                                            <ul class="list-group riskCategory"></ul>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary"
                                                onclick="addValue('Risk Category', 'riskCategory')">Add</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade  " id="templateCategoryList" role="tabpanel"
                                    aria-labelledby="template-category-list">
                                    
                                    <div class="row ">
                                        <div class="col-10">
                                            <ul class="list-group templateCategory"></ul>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary"
                                                onclick="addValue('Template Category', 'templateCategory')">Add</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="userRoleList" role="tabpanel"
                                    aria-labelledby="review-category-list">
                                    
                                    <div class="row ">
                                        <div class="col-10">
                                            <ul class="list-group userRole"></ul>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary"
                                                onclick="addValue('User Role', 'userRole')">Add</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-3" id="config" role="tabpanel" aria-labelledby="config-tab">
                    <div class="alertDiv"></div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Sonar url</span>
                        </div>
                        <input type="text" class="form-control" id="sonar" >                        
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-primary" onclick="saveConfig()">Save</button>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>


    </div>
</div>


<script>
    // Global Variables
    var dropdownData, configData;
    
    $(document).ready(function () {
        dropdownData = <?= json_encode($dropdownData) ?> ;
        configData = <?= json_encode($configData)?>;
        
        for (var i = 0; i < dropdownData.length; i++) {
            const identifier = dropdownData[i].identifier;
            const options = JSON.parse(dropdownData[i].options);

            if (options == null) {
                showAlert("alert-warning", "No records found.", "enumAlert");
            } else {
                for (var j = 0; j < options.length; j++) {
                    addItemToList(options[j].value, identifier);
                }
            }
        }

        for (var i = 0; i < configData.length; i++) {
            const identifier = configData[i].identifier;
            const options = JSON.parse(configData[i].options);
            for (var j = 0; j < options.length; j++) {
                if (options != null) {
                    $("#"+options[j].key).val(options[j].value);
                }
            }
        }

    });

    function addItemToList(value, listClass) {
        var listCss = "list-group-item list-group-item-action";
        var newItem = '<li class="' + listCss + '">' + value + '</li>';
        $("." + listClass).append(newItem);
    }


    function addValue(listName, listClass) {
        var title = "Add " + listName;
        bootbox.prompt({
            title: title,
            centerVertical: true,
            callback: function (result) {
                if (result != null && result != "") {
                    result = result.trim();
                    var dataIndex = dropdownData.findIndex(x => x.identifier === listClass);
                    var existingOptions = JSON.parse(dropdownData[dataIndex]["options"])

                    var newKey = getMax(existingOptions, "key") + 1;
                    var newItem = {
                        key: newKey,
                        value: result
                    };

                    if (existingOptions == null) existingOptions = [];
                    existingOptions.push(newItem);
                    var updatedOptions = JSON.stringify(existingOptions);


                    var object = {
                        id: dropdownData[dataIndex].id,
                        identifier: listClass,
                        options: updatedOptions
                    };

                    saveToDB(object, listName, listClass, dataIndex, updatedOptions, result);
                }

            }
        });
    }

    function saveToDB(object, title, listClass, dataIndex, updatedOptions, newItem) {
        const successMsg = title + " added successfully.";
        $.ajax({
            type: 'POST',
            url: '/admin/settings/addEnums',
            data: object,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.success == "True") {
                    dropdownData[dataIndex]["options"] = updatedOptions;
                    addItemToList(newItem, listClass);
                    showAlert("alert-success", successMsg, "enumAlert");
                } else {
                    showAlert("alert-danger", "Failed to add a new item.", "enumAlert");
                }
            },
            error: function (err) {
                console.log(err);
            }
        });

    }

    function saveConfig(){
        var identifier = "third-party";
        var sonarUrl = $("#sonar").val();
        if(sonarUrl  != ""){
            console.log(sonarUrl);
            var configIndex = configData.findIndex(x => x.identifier === identifier);
            var existingOptions = JSON.parse(configData[configIndex]["options"]);

            for(var z = 0 ; z< existingOptions.length ; z++){
                if(existingOptions[z]["key"] == "sonar"){
                    existingOptions[z]["value"] = sonarUrl;
                }
            }
            
            var updatedOptions = JSON.stringify(existingOptions);
            configData[configIndex]["options"] = updatedOptions;
            
            var object = {
                id: configData[configIndex].id,
                identifier: identifier,
                options: updatedOptions
            };
            
            $.ajax({
                type: 'POST',
                url: '/admin/settings/addEnums',
                data: object,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.success == "True") {
                        showAlert("alert-success", "Configuration saved successfully.", 'config');
                    } else {
                        showAlert("alert-danger", "Failed to save config.", 'config');
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });


        }
        
    }

    function showAlert(type, message, parentId) {
        // alert-warning or alert-success or alert-danger
        const html = `<div class="alert ${type} alert-dismissible fade show" role="alert">
                            ${message}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                        </button>
                      </div>`;
        
        $("#" + parentId + " .alertDiv").html(html);

    }

    function getMax(arr, prop) {
        if (arr == null) {
            return -1;
        }
        var max;
        for (var i = 0; i < arr.length; i++) {
            var compare = arr[i][prop];
            if (max == null || parseInt(compare) > parseInt(max))
                max = compare;
        }
        return max;
    }
</script>