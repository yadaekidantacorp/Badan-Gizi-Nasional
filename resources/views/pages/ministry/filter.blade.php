<div class="card-header border-0">
    <div class="card-title">
        <div class="d-flex align-items-center position-relative my-1">
            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
            <input type="text" wire:model.live="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari">
        </div>
    </div>
    <div class="card-toolbar">
        <a href="#" id="kt_horizontal_search_advanced_link" class="btn btn-link d-none" data-bs-toggle="collapse" data-bs-target="#kt_advanced_search_form">Advanced Search</a>
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
            <div class="d-flex flex-wrap my-1">
                <input type="radio" class="btn-check" wire:model.live="layout" name="layout" value="grid" checked="checked" id="layout_option_1"/>
                <label class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3" for="layout_option_1">
                    <i class="ki-outline ki-element-plus fs-2"></i>
                </label>
                <input type="radio" class="btn-check" wire:model.live="layout" name="layout" value="list" id="layout_option_2"/>
                <label class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary me-3" for="layout_option_2">
                    <i class="ki-outline ki-row-horizontal fs-2"></i>
                </label>
                <div class="d-flex my-0">
                    <select name="order" wire:model.live="order" class="form-select form-select-sm border-body bg-body w-250px me-5">
                        <option value="1">Urutkan berdasarkan Menaik (A-Z)</option>
                        <option value="2">Urutkan berdasarkan Menurun (Z-A)</option>
                    </select>
                    <select name="status" data-control="select2" data-hide-search="true" data-placeholder="Export" class="form-select form-select-sm border-body bg-body w-100px d-none">
                        <option value="1">Excel</option>
                        <option value="1">PDF</option>
                        <option value="2">Print</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="kt_advanced_search_form">
        <div class="separator separator-dashed mt-9 mb-6"></div>
        <div class="row g-8 mb-8">
            <div class="col-xxl-7">
                <label class="fs-6 form-label fw-bold text-gray-900">Tags</label>
                <input type="text" class="form-control form-control form-control-solid" name="tags" value="products, users, events" />
            </div>
            <div class="col-xxl-5">
                <div class="row g-8">
                    <div class="col-lg-6">
                        <label class="fs-6 form-label fw-bold text-gray-900">Team Type</label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
                            <option value=""></option>
                            <option value="1">Not started</option>
                            <option value="2" selected="selected">In Progress</option>
                            <option value="3">Done</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="fs-6 form-label fw-bold text-gray-900">Select Group</label>
                        <div class="nav-group nav-group-fluid">
                            <label>
                                <input type="radio" class="btn-check" name="type" value="has" checked="checked" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">All</span>
                            </label>
                            <label>
                                <input type="radio" class="btn-check" name="type" value="users" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Users</span>
                            </label>
                            <label>
                                <input type="radio" class="btn-check" name="type" value="orders" />
                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4">Orders</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-8">
            <div class="col-xxl-7">
                <div class="row g-8">
                    <div class="col-lg-4">
                        <label class="fs-6 form-label fw-bold text-gray-900">Min. Amount</label>
                        <div class="position-relative" data-kt-dialer="true" data-kt-dialer-min="1000" data-kt-dialer-max="50000" data-kt-dialer-step="1000" data-kt-dialer-prefix="$" data-kt-dialer-decimals="2">
                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                <i class="ki-outline ki-minus-circle fs-1"></i>
                            </button>
                            <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="$50" />
                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                <i class="ki-outline ki-plus-circle fs-1"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="fs-6 form-label fw-bold text-gray-900">Max. Amount</label>
                        <div class="position-relative" data-kt-dialer="true" data-kt-dialer-min="1000" data-kt-dialer-max="50000" data-kt-dialer-step="1000" data-kt-dialer-prefix="$" data-kt-dialer-decimals="2">
                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                <i class="ki-outline ki-minus-circle fs-1"></i>
                            </button>
                            <input type="text" class="form-control form-control-solid border-0 ps-12" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="readonly" value="$100" />
                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                <i class="ki-outline ki-plus-circle fs-1"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="fs-6 form-label fw-bold text-gray-900">Team Size</label>
                        <input type="text" class="form-control form-control form-control-solid" name="city" />
                    </div>
                </div>
            </div>
            <div class="col-xxl-5">
                <div class="row g-8">
                    <div class="col-lg-6">
                        <label class="fs-6 form-label fw-bold text-gray-900">Category</label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="In Progress" data-hide-search="true">
                            <option value=""></option>
                            <option value="1">Not started</option>
                            <option value="2" selected="selected">Select</option>
                            <option value="3">Done</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label class="fs-6 form-label fw-bold text-gray-900">Status</label>
                        <div class="form-check form-switch form-check-custom form-check-solid mt-1">
                            <input class="form-check-input" type="checkbox" value="" id="flexSwitchChecked" checked="checked" />
                            <label class="form-check-label" for="flexSwitchChecked">Active</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>