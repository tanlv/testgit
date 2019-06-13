<!--<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js'></script>-->

<header class="section-header filter-box">
    <div class="d-flex">
        <h3><a href="<?=\lib\input::vars('root_domain');?>/?site=replenishment">Replenishment</a></h3>
        <!--                <div class="header-btn">-->
        <!--                    <a href="#" class="btn btn-white d-none d-sm-inline-block"><i class="fa fa-list-alt"></i> Columns </a>-->
        <!--                    <div class="btn-group">-->
        <!--                        <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--                            <i class="fas fa-arrow-alt-circle-down"></i> Export-->
        <!--                        </button>-->
        <!--                        <div class="dropdown-menu">-->
        <!--                            <a class="dropdown-item" href="#"><i class="far fa-file-excel"></i> CSV/Excel Format</a>-->
        <!--                            <a class="dropdown-item" href="#"><i class="fas fa-list"></i> Full Inventory View</a>-->
        <!--                            <a class="dropdown-item" href="#"><i class="fas fa-redo"></i> All Products to Replenish</a>-->
        <!---->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="btn-group">-->
        <!--                        <button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
        <!--                            <i class="fas fa-arrow-alt-circle-up"></i> Import-->
        <!--                        </button>-->
        <!--                        <div class="dropdown-menu">-->
        <!--                            <a class="dropdown-item" href="#"><i class="far fa-file-excel"></i> CSV/Excel Format</a>-->
        <!--                            <a class="dropdown-item" href="#"><i class="fas fa-list"></i> Full Inventory View</a>-->
        <!--                            <a class="dropdown-item" href="#"><i class="fas fa-redo"></i> All Products to Replenish</a>-->
        <!---->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <a href="#" class="btn btn-white d-none d-md-inline-block"><i class="far fa-question-circle"></i> Learn more about replenishment </a>-->
        <!--                </div>-->
    </div>
</header>

<section class="box-heading box-status box-navtop filter-box mb-md-15">
    <div class="box-heading-body d-sm-unflex d-flex justify-content-between ">
        <div class="thead-left">
            <ul class="nav-filter nav-filter-sm-3col clearfix">
                <li tab="variant"><a href="#">Variants</a></li>
                <li tab="product"><a href="<?=\lib\input::vars('root_domain');?>/?site=replenishment&tab=product">Product</a></li>
                <!--                        <li><a href="#">Products</a></li>-->
                <!--                        <li><a href="#">Vendors</a></li>-->
                <!--                        <li><a href="#">Total</a></li>-->
                <!--                        <li><a href="#">Categories</a></li>-->
                <!--                        <li><a href="#">Brands</a></li>-->
            </ul>
        </div>

        <div class="thead-right sm-mt-0">
            <div class="d-md-flex text-sm-center">
                <a class="btn btn-success" onclick="Rep.exportExcel();" style="margin-right: 10px;">Export</a>
                <select name="change_time" onchange="Rep.changeTime(this);" class="select-box mr-0 auto_select_2" defaultvalue="<?=\lib\input::get('type_url', 'last_month');?>">
                    <option value="">-- Custom Range --</option>
                    <option value="last_month">
                        <?if(!\lib\input::get('type_url')){?>
                            <?=date("M Y", strtotime('first day of previous month'));?> - <?=date("M Y", strtotime('last day of previous month'));?>
                        <? }else if(\lib\input::get('type_url') == "last_month") { ?>
                            <?=date("M Y", strtotime(\lib\input::get('date_from')));?> - <?=date("M Y", strtotime(\lib\input::get('date_to')));?>
                        <? }else{ ?>
                            Last month
                        <? } ?>
                    </option>
                    <option value="last_3_month">
                        <?if(\lib\input::get('type_url') == "last_3_month") { ?>
                            <?=date("M Y", strtotime(\lib\input::get('date_from')));?> - <?=date("M Y", strtotime(\lib\input::get('date_to')));?>
                        <? }else{ ?>
                            Last 3 Months
                        <? } ?>
                    </option>
                    <option value="last_6_month">
                        <?if(\lib\input::get('type_url') == "last_6_month") { ?>
                            <?=date("M Y", strtotime(\lib\input::get('date_from')));?> - <?=date("M Y", strtotime(\lib\input::get('date_to')));?>
                        <? }else{ ?>
                            Last 6 Months
                        <? } ?>
                    </option>
                    <option value="last_year">
                        <?if(\lib\input::get('type_url') == "last_year") { ?>
                            <?=date("M Y", strtotime(\lib\input::get('date_from')));?> - <?=date("M Y", strtotime(\lib\input::get('date_to')));?>
                        <? }else{ ?>
                            Last Year
                        <? } ?>
                    </option>
                    <option value="last_2_year">
                        <?if(\lib\input::get('type_url') == "last_2_year") { ?>
                            <?=date("M Y", strtotime(\lib\input::get('date_from')));?> - <?=date("M Y", strtotime(\lib\input::get('date_to')));?>
                        <? }else{ ?>
                            Last 2 Year
                        <? } ?>
                    </option>
                    <option value="last_3_year">
                        <?if(\lib\input::get('type_url') == "last_3_year") { ?>
                            <?=date("M Y", strtotime(\lib\input::get('date_from')));?> - <?=date("M Y", strtotime(\lib\input::get('date_to')));?>
                        <? }else{ ?>
                            Last 3 Year
                        <? } ?>
                    </option>
                    <option value="custom_range">
                        <?if(\lib\input::get('type_url') == "custom_range") { ?>
                            <?=date("M Y", strtotime(\lib\input::get('date_from')));?> - <?=date("M Y", strtotime(\lib\input::get('date_to')));?>
                        <? }else{ ?>
                            Custom range
                        <? } ?>
                    </option>
                </select>
            </div>
        </div>
    </div>
</section>

<section class="box-typical scrollable filter-box">
    <div class="box-typical-body">
        <div class="table-heading">
            <!--    <form name="form_search" action="--><?//=\lib\input::vars('root_domain');?><!--/?site=replenishment&act=search" method="post">-->
            <div class="d-flex ">
                <div class="form-group input-group mb-0">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filters
                        </button>
                        <ul class="dropdown-menu multi-column columns-4">
                            <div class="row">
                                <div class="col-sm-3 col-height-200">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="#" onclick="Rep.addFilter('product')">By product</a></li>
                                        <li><a href="#" onclick="Rep.addFilter('color')">By color</a></li>
                                        <li><a href="#" onclick="Rep.addFilter('except_black')">All colors (except black)</a></li>
                                        <li><a href="#" onclick="Rep.addFilter('size')">By size</a></li>
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <!--                                                <li class="divider"></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('filter','true')">Filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Another filter','true')">Another filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <!--                                                <li class="divider"></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('filter','true')">Filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Another filter','true')">Another filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <!--                                                <li class="divider"></li>-->
                                    </ul>
                                </div>
                                <div class="col-sm-3 col-height-200">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="#" onclick="Rep.addFilter('out_of_stock')">Out of stock</a></li>
                                        <li><a href="#" onclick="Rep.addFilter('on_stock')">On stock</a></li>
                                        <li><a href="#" onclick="Rep.addFilter('class_a')">Class A</a></li>
                                        <li><a href="#" onclick="Rep.addFilter('class_b')">Class B</a></li>
                                        <li><a href="#" onclick="Rep.addFilter('class_c')">Class C</a></li>

                                        <!--                                                <li class="divider"></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('filter','true')">Filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Another filter','true')">Another filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <!--                                                <li class="divider"></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('filter','true')">Filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Another filter','true')">Another filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <li class="divider"></li>
                                    </ul>
                                </div>
                                <div class="col-sm-3 col-height-200">
                                    <ul class="multi-column-dropdown">
                                        <li><a href="#" onclick="Rep.addFilter('reorder')">Reorder larger than 0</a></li>
                                        <!--                                                <li><a href="#" ng-click="addFilter('Another filter','true')">Another filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <!--                                                <li class="divider"></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('filter','true')">Filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Another filter','true')">Another filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <!--                                                <li class="divider"></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('filter','true')">Filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Another filter','true')">Another filter</a></li>-->
                                        <!--                                                <li><a href="#" ng-click="addFilter('Some filter','true')">Some filter</a></li>-->
                                        <!--                                                <li class="divider"></li>-->
                                    </ul>
                                </div>
                                <!--                                        <div class="col-sm-3 col-height-200">-->
                                <!--                                            <ul class="multi-column-dropdown">-->
                                <!--                                                <li><a href="#">Action</a></li>-->
                                <!--                                                <li><a href="#">Another action</a></li>-->
                                <!--                                                <li><a href="#">Something else here</a></li>-->
                                <!--                                                <li class="divider"></li>-->
                                <!--                                                <li><a href="#">Separated link</a></li>-->
                                <!--                                                <li class="divider"></li>-->
                                <!--                                                <li><a href="#">One more separated link</a></li>-->
                                <!--                                                <li><a href="#">Action</a></li>-->
                                <!--                                                <li><a href="#">Another action</a></li>-->
                                <!--                                                <li><a href="#">Something else here</a></li>-->
                                <!--                                                <li class="divider"></li>-->
                                <!--                                                <li><a href="#">Separated link</a></li>-->
                                <!--                                                <li class="divider"></li>-->
                                <!--                                                <li><a href="#">One more separated link</a></li>-->
                                <!--                                            </ul>-->
                                <!--                                        </div>-->
                            </div>
                        </ul>
                    </div>
                    <?=isset($tpl->hiden_input) ? $tpl->hiden_input : "";?>
                    <input type="text" class="form-control" name="key_search" placeholder="Enter a key search such as: product name, sku, gtin " value="<?=\lib\input::get('key_search');?>" onkeypress="Rep.checkEnter(event);">
                    <input type="hidden" name="subact" value="<?=\lib\input::get('subact');?>"/>
                    <input type="hidden" name="act" value="<?=\lib\input::get('act');?>"/>
                    <input type="hidden" name="date_from" value="<?=\lib\input::get('date_from');?>"/>
                    <input type="hidden" name="date_to" value="<?=\lib\input::get('date_to');?>"/>
                    <input type="hidden" name="type_url" value="<?=\lib\input::get('type_url');?>"/>
                    <input type="hidden" name="limit" value="<?=$tpl->limit_rep;?>"/>
                    <input type="hidden" name="page" value="<?=\lib\input::get('page');?>"/>
                    <div class="input-group-btn"><button type="button" class="btn btn-primary" onclick="Rep.buildSearch();">Search</button></div>
                </div>

            </div>
            <!--    </form>-->


            <div class="filter-row">
                <?=isset($tpl->tags_search) ? $tpl->tags_search : "";?>
                <input type="hidden" name="current_url" value="<?=\lib\input::vars('root_domain');?>/?<?=$_SERVER['QUERY_STRING'];?>"/>
                <?if(isset($tpl->tags_search)){ ?>
                    <a class="text-primary pull-right small" style="text-decoration: underline;" onclick="Rep.clearFilter();">Clear filter</a>
                <? } ?>
                <!--                        <div class="btn-group btn-group-sm" style="margin-right: 5px;">-->
                <!--                            <button type="button" class="btn btn-default-outline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                                replenishable<span class="sr-only"></span>-->
                <!--                            </button>-->
                <!--                            <button type="button" class="btn btn-default-outline" ng-click="remove($index)">-->
                <!--                                <i class="fa fa-times"></i>-->
                <!--                            </button>-->
                <!--                            <div class="dropdown-menu">-->
                <!--                                <a class="dropdown-item" href="#"><i class="text-success fa fa-check-circle"></i> True</a>-->
                <!--                                <a class="dropdown-item" href="#"><i class="text-danger far fa-circle"></i> False</a>-->
                <!--                                <div class="dropdown-divider"></div>-->
                <!--                                <div class="dropdown-item"><a class="btn btn-outline btn-block btn-sm " href="#">Filter</a></div>-->
                <!--                            </div>-->
                <!--                        </div>-->
            </div>
            <!--                        <div class="btn-group btn-group-sm ng-scope" ng-repeat="(id, filter) in filterVal" style="margin-right: 5px;">-->
            <!--                            <button type="button" class="btn btn-default-outline dropdown-toggle ng-binding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <!--                                check<span class="sr-only"></span>-->
            <!--                            </button>-->
            <!--                            <button type="button" class="btn btn-default-outline" ng-click="remove($index)">-->
            <!--                                <i class="fa fa-times"></i>-->
            <!--                            </button>-->
            <!--                            <div class="dropdown-menu">-->
            <!--                                <a class="dropdown-item" href="#"><i class="text-success fa fa-check-circle"></i> True</a>-->
            <!--                                <a class="dropdown-item" href="#"><i class="text-danger far fa-circle"></i> False</a>-->
            <!--                                <div class="dropdown-divider"></div>-->
            <!--                                <div class="dropdown-item"><a class="btn btn-outline btn-block btn-sm " href="#">Filter</a></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="btn-group btn-group-sm ng-scope" ng-repeat="(id, filter) in filterVal" style="margin-right: 5px;">-->
            <!--                            <button type="button" class="btn btn-default-outline dropdown-toggle ng-binding" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <!--                                visible<span class="sr-only"></span>-->
            <!--                            </button>-->
            <!--                            <button type="button" class="btn btn-default-outline" ng-click="remove($index)">-->
            <!--                                <i class="fa fa-times"></i>-->
            <!--                            </button>-->
            <!--                            <div class="dropdown-menu">-->
            <!--                                <a class="dropdown-item" href="#"><i class="text-success fa fa-check-circle"></i> True</a>-->
            <!--                                <a class="dropdown-item" href="#"><i class="text-danger far fa-circle"></i> False</a>-->
            <!--                                <div class="dropdown-divider"></div>-->
            <!--                                <div class="dropdown-item"><a class="btn btn-outline btn-block btn-sm " href="#">Filter</a></div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!---->
            <!---->
            <!--                    </div>-->
            <div class="d-md-flex mt-15 mt-md-40 justify-content-between">
                <div class="btn-group mr-auto" data-toggle="buttons" check="bulk_action">
                    <button class="btn btn-default-outline btn_bulkaction" disabled aria-haspopup="true" aria-expanded="false" data-toggle="" check="bulk_action">
                        <span check="bulk_action">Bulk Actions </span>
                        <span class="number_count" check="bulk_action" style="display: none;">(0) row selected</span>
                    </button>
                    <div class="dropdown-menu">
                        <!--                <a class="dropdown-item" href="#">Delete Order</a>-->
                        <!--                <a class="dropdown-item" href="#">Edit Purchase Order</a>-->
                        <!--                <a class="dropdown-item" href="#">Replenish</a>-->
                        <!--                <div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" onclick="Rep.addAction('&subact=detail_purchase', '<?=\lib\input::vars('root_domain');?>/?site=purchase_order');">Create Purchase Order</a>
                        <a class="dropdown-item" onclick="Rep.addToPurchaseOrder();">Add to purchase order</a>
                        <!--                <div class="dropdown-divider"></div>-->
                        <!--                <div class="dropdown-item">Set Replenishable</div>-->
                    </div>
                    <?if(\lib\input::get('stocktake')==0) { ?>
                        <button class="btn" style="color: #fff; background: #00a8ff; border-radius: 3px;" id="stocktake" is_active="<?=\lib\input::get('stocktake', 0);?>" onclick="this.setAttribute('is_active', 1);Rep.buildSearch();">
                            <span>Stocktake</span>
                        </button>
                    <? }else{ ?>
                        <button class="btn" style="color: #fff; background-color: #fa424a; border-color: #fa424a;; border-radius: 3px;" id="stocktake" is_active="<?=\lib\input::get('stocktake', 0);?>" onclick="this.setAttribute('is_active', 0);Rep.buildSearch();">
                            <span>Close Stocktake</span>
                        </button>
                    <? } ?>
                </div>
                <select class="select-box mr-2 auto_select_2" name="sort_reorder" defaultvalue="<?=\lib\input::get('sort_reorder');?>" onchange="Rep.buildSearch();">
                    <option value="">-- Sort replenishment --</option>
                    <option value="reorder_asc">Replenishment ASC</option>
                    <option value="reorder_desc">Replenishment DESC</option>
                </select>
                <select class="select-box mr-2 auto_select_2" name="sort_stock" defaultvalue="<?=\lib\input::get('sort_stock');?>" onchange="Rep.buildSearch();">
                    <option value="">-- Sort stock --</option>
                    <option value="stock_asc">Stock ASC</option>
                    <option value="stock_desc">Stock DESC</option>
                </select>
                <select class="select-box mr-0 auto_select_2" name="sort_onorder" defaultvalue="<?=\lib\input::get('sort_onorder');?>" onchange="Rep.buildSearch();">
                    <option value="">-- Sort on order --</option>
                    <option value="onorder_asc">On order ASC</option>
                    <option value="onorder_desc">On order DESC</option>
                </select>

                <ul class="pagination pagination-sm box_limit" style="cursor: pointer;">
                    <li class="page-item" val="10"><a class="page-link" onclick="$('input[name=limit]').val(10); Rep.buildSearch();">10</a></li>
                    <li class="page-item" val="50"><a class="page-link" onclick="$('input[name=limit]').val(50); Rep.buildSearch();">50</a></li>
                    <li class="page-item" val="100"><a class="page-link" onclick="$('input[name=limit]').val(100); Rep.buildSearch();">100</a></li>
                    <li class="page-item" val="200"><a class="page-link" onclick="$('input[name=limit]').val(200); Rep.buildSearch();">200</a></li>
                    <li class="page-item" val="300"><a class="page-link" onclick="$('input[name=limit]').val(300); Rep.buildSearch();">300</a></li>
                    <li class="page-item" val="500"><a class="page-link" onclick="$('input[name=limit]').val(500); Rep.buildSearch();">500</a></li>
                </ul>
                <!--                        <div class="form-group mb-0 mt-sm-15 inline-sm">-->
                <!--                            <div class="checkbox">-->
                <!--                                <input type="checkbox" id="check-2" checked="" ng-model="leftFixPanel" class="ng-pristine ng-untouched ng-valid">-->
                <!--                                <label for="check-2">Fix left panel</label>-->
                <!--                            </div>-->
                <!--                        </div>-->

                <!--        <a class="text-primary small pull-right" href="--><?//=\lib\input::vars('root_domain');?><!--/?site=replenishment&subact=page_cart">Go to your cart <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>

        </div>

        <div>

        </div>
        <div class=" wrap-left-layer">
            <form id="addcart" name="form_addcart" method="post" action="<?=\lib\input::vars('root_domain');?>/?site=replenishment">
                <input type="hidden" name="base_url" value="<?=\lib\input::vars('root_domain');?>/?site=replenishment" />
                <div class="table-body-wrap">
                    <table class="table table-replenishment table-bordered table-hover table-zp" style="">
                        <thead>
                        <tr>
                            <th style="width: 1%;" class="bs-checkbox">
                                <div class="checkbox checkbox-only">
                                    <input id="checkall" name="btSelectItem[]" type="checkbox" onchange="Rep.checkAll($(this), $('.id_check'))">
                                    <label for="checkall"></label>
                                </div></th>
                            <!--                <th style="width:3%;">Image</th>-->
                            <th>Brand</th>
                            <th style="width:15%;">Name</th>
                            <th style="width:10%;">SKU</th>
                            <th style="width:10%;">Vendor</th>
                            <th style="width:10%;">Price</th>
                            <th style="width:10%;">Cost Price</th>
                            <th style="width:10%;">Stock</th>
                            <th style="width:10%;">Temp stock</th>
                            <th style="width:3%;">On Order</th>
                            <th style="width:3%;">Forcast Profit</th>
                            <th style="width:5%;">Replenishment</th>
                            <th style="width:10%;">Sell this month</th>
                            <th style="width:10%;">Sell last month</th>
                            <th style="width:5%; text-align: center;">Queue</th>
                            <!--                <th style="width:5%;"></th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <? if(count($tpl->data) > 0){
                            foreach ($tpl->data as $data){?>
                                <tr>
                                    <td class="bs-checkbox">
                                        <div class="checkbox checkbox-only">
                                            <input class="id_check" name="id_checked[]" id="item-checkbox-<?=$data['var_id'];?>" value="<?=$data['var_id'];?>" onclick="Rep.bulkAction();" type="checkbox">
                                            <label for="item-checkbox-<?=$data['var_id'];?>"></label>
                                        </div>
                                    </td>
                                    <!--                <td><a href="#"><img class="img-pro" alt="" src="--><?//=$data['image_product'];?><!--"></a></td>-->
                                    <td><?=\lib\input::arrayValue($data, 'brand_name');?></td>
                                    <td><?=$data['var_title'];?></td>
                                    <td><?=$data['var_sku'];?></td>
                                    <td>S&S Activewear</td>
                                    <td><?=\lib\input::currency($data['var_price']);?></td>
                                    <td>

                                        <?if(\lib\input::get('stocktake')==1){ ?>
                                            <input type="text" name="var_cost_price" maxlength="10" onkeypress="return FnCore.typeNumber(event,this);" value="<?=$data['var_cost_price'];?>" class="form-control" onchange="Rep.updateCostPrice(this, '<?=$data['var_id'];?>');" />
                                        <? }else{ ?>
                                            <?=\lib\input::currency($data['var_cost_price']);?>
                                        <? }?>
                                    </td>
                                    <td>

                                        <?if(\lib\input::get('stocktake')==1){ ?>
                                            <input type="text" class="form-control" onkeypress="return FnCore.typeNumber(event,this);" name="var_available" value="<?=$data['var_available'];?>" onchange="Rep.updateQuantity(this, '<?=$data['var_id'];?>');" />
                                        <? }else{ ?>
                                            <?=$data['var_available'];?>
                                        <? } ?>
                                    </td>
                                    <td><?=\lib\input::arrayValue($data,'temp_stock');?></td>
                                    <td><?=\lib\input::arrayValue($data,'on_order');?></td>
                                    <td><?=\lib\input::arrayValue($data,'forecast');?></td>
                                    <td><?=\lib\input::arrayValue($data,'reorder');?></td>
                                    <td><?=\lib\input::arrayValue($data,'sell_this_month');?></td>
                                    <td><?=\lib\input::arrayValue($data,'sell_last_month');?></td>
                                    <td style=" text-align: center;"><?=\lib\input::arrayValue($data,'var_queue');?></td>
                                    <!--td><a title="Add to cart" class="btn btn-primary btn-small" onclick="Rep.addItem('<?=$data['var_id'];?>');"><i class="fas fa-cart-plus"></i></a></td-->
                                </tr>

                            <? }} else {?>
                            <tr>
                                <td colspan="16">No variant</td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>
                </div>
            </form>


        </div>
        <div class="table-pagination">
            <div class="paging-left">
                <div class="d-flex">
                    <?=$tpl->show_page;?>
                </div>
            </div>
            <div class="paging-right">
                <ul class="pagination pagination-sm box_limit" style="cursor: pointer;">
                    <li class="page-item" val="10"><a class="page-link" onclick="$('input[name=limit]').val(10); Rep.buildSearch();">10</a></li>
                    <li class="page-item" val="50"><a class="page-link" onclick="$('input[name=limit]').val(50); Rep.buildSearch();">50</a></li>
                    <li class="page-item" val="100"><a class="page-link" onclick="$('input[name=limit]').val(100); Rep.buildSearch();">100</a></li>
                    <li class="page-item" val="200"><a class="page-link" onclick="$('input[name=limit]').val(200); Rep.buildSearch();">200</a></li>
                    <li class="page-item" val="300"><a class="page-link" onclick="$('input[name=limit]').val(300); Rep.buildSearch();">300</a></li>
                    <li class="page-item" val="500"><a class="page-link" onclick="$('input[name=limit]').val(500); Rep.buildSearch();">500</a></li>
                </ul>
            </div>

        </div>

    </div><!--.box-typical-body-->
</section><!--.box-typical-->
<!--Popup add purchase order-->
<div id="popup_purchase" class="popup_package white-popup-block mfp-hide col-md-6" style="float: none;margin: 0 auto; background: #fff; clear: both; overflow: hidden; padding: 20px 30px;">
    <div class="box_ship">
        <h5>Add variants to existing purchase order</h5>
        <div class="box_purchase_order">

        </div>
    </div>
</div>
<!--Popup add purchase order-->
<div id="popup_date" class="popup_package white-popup-block mfp-hide col-md-6" style="float: none;margin: 0 auto; background: #fff; clear: both; overflow: hidden; padding: 20px 30px;">
    <h5>Choose date range</h5>
    <div class="box_date">
        <div class="row">

            <div class='col-lg-6 col-md-6'>
                <label class="form-control-label">Date from:</label>
                <input class="form-control datetimepicker6" readonly name="time_from">
                <div id="datetimepicker6"></div>
            </div>
            <div class='col-lg-6 col-md-6'>
                <label class="form-control-label">Date to:</label>
                <input class="form-control datetimepicker7" class="form-control" readonly name="time_to">
                <div id="datetimepicker7"></div>
            </div>
            <div class="col-lg-12 col-md-12" style="margin-top: 20px;">
                <button class="btn btn-primary pull-right" onclick="Rep.ApplyTime(this);">Apply date</button>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker6, #datetimepicker7').datetimepicker({inline: true,sideBySide: true, viewMode: 'months', format: 'MMM - YYYY'});
                $('#datetimepicker7').datetimepicker({
                    useCurrent: false,
                    locale: moment.locale('se'),
                });
                $("#datetimepicker6").on("dp.change", function (e) {
                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                    var date = new Date(e.date._d);
                    var date_from = new Date(date.getFullYear(), date.getMonth(), 1);
                    date_from = moment(date_from).format("YYYY-MM-DD");
                    $(".datetimepicker6").val(date_from);

                });
                $("#datetimepicker7").on("dp.change", function (e) {
                    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                    var date = new Date(e.date._d);
                    var date_to = new Date(date.getFullYear(), date.getMonth() + 1, 0);
                    date_to = moment(date_to).format("YYYY-MM-DD");
                    $(".datetimepicker7").val(date_to);
                });
            });
        </script>

    </div>
</div>
<?=\lib\assets::generate(array(
    "assets/js/app_replenishment.js?210012062018",
//    "assets/js/angularApp.js?093413122018",
//    "assets/js/page.js?093413122018",
), "js");?>
<script type="text/javascript">
    $(document).ready(function () {
        // active limit button
        var limit = "<?=$tpl->limit_rep;?>";
        $(".box_limit").find("li[val='"+limit+"']").addClass("active");
        // check time
        //var type_url = "<?//=\lib\input::get('type_url');?>//";
        //
        //if(!type_url)
        //{
        //    var date_from = "<?//=date("Y-m-d", strtotime('first day of previous month'));?>//";
        //    var date_to = "<?//=date("Y-m-d", strtotime('last day of previous month'));?>//";
        //    $("input[name='date_from']").val(date_from);
        //    $("input[name='date_to']").val(date_to);
        //    // Rep.buildSearch();
        //    var url = window.location.href+"&date_from="+date_from+"&date_to="+date_to+"&type_url=last_month";
        //    // rewrite url
        //    if (typeof (history.pushState) != "undefined") {
        //        var obj = { Title: "Replenishment", Url: url };
        //        history.pushState(obj, obj.Title, obj.Url);
        //    } else {
        //        alert("Browser does not support HTML5.");
        //    }
        //}

        // active tab
        var tab_active = "<?=\lib\input::get('tab', 'variant');?>";
        $(".nav-filter li[tab='"+tab_active+"']").addClass('active');
    })
</script>
