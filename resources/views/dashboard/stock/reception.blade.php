@extends('dashboard/layout')

@section('content')
<div class="d-flex flex-column bg-white pt-4">
    <div class="d-flex justify-content-between align-items-center pr-4 pl-4">
        <div class="d-flex">
            <h3 class="header-title">استقبال</h3>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end bg-grey bt1 bb1 p-2">
        <div class="dropdown dropdown-city">
            <button class="dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown" 
                    aria-haspopup="true"
                    aria-expanded="false">
                حسب المدينة
            </button>
            <div    class="dropdown-menu by-city-dropdown tx-right"
                    aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">الرباط</a>
                <a class="dropdown-item" href="#">أكادير</a>
                <a class="dropdown-item" href="#">مراكش</a>
                <a class="dropdown-item" href="#">الرباط</a>
                <a class="dropdown-item" href="#">أكادير</a>
                <a class="dropdown-item" href="#">مراكش</a>
                <a class="dropdown-item" href="#">الرباط</a>
                <a class="dropdown-item" href="#">أكادير</a>
                <a class="dropdown-item" href="#">مراكش</a>
                <a class="dropdown-item" href="#">الرباط</a>
                <a class="dropdown-item" href="#">أكادير</a>
                <a class="dropdown-item" href="#">مراكش</a>
            </div>
        </div>
        <div class="dropdown dropdown-product">
            <button class="dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown" 
                    aria-haspopup="true"
                    aria-expanded="false">
                حسب المنتج
            </button>
            <div    class="dropdown-menu by-product-dropdown tx-right"
                    aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">فوو</a>
                <a class="dropdown-item" href="#">بوو</a>
                <a class="dropdown-item" href="#">فوو بوو</a>
                <a class="dropdown-item" href="#">فوو</a>
                <a class="dropdown-item" href="#">بوو</a>
                <a class="dropdown-item" href="#">فوو بوو</a>
                <a class="dropdown-item" href="#">فوو</a>
                <a class="dropdown-item" href="#">بوو</a>
                <a class="dropdown-item" href="#">فوو بوو</a>
                <a class="dropdown-item" href="#">فوو</a>
                <a class="dropdown-item" href="#">بوو</a>
                <a class="dropdown-item" href="#">فوو بوو</a>
                <a class="dropdown-item" href="#">فوو</a>
                <a class="dropdown-item" href="#">بوو</a>
                <a class="dropdown-item" href="#">فوو بوو</a>
            </div>
        </div>
    </div>
</div>
<div class="page-inner">
    <div class="d-flex flex-column">
        <div class="col-12">
            <div class="card-body pd-0 pt-4 tx-center">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
                            <th scope="col" class="latin" data-type="reference">Reference</th>
                            <th scope="col" class="latin" data-type="productname">
                                Nom de<br class="sm-break">
                                produit
                            </th>
                            <th scope="col" class="latin" data-type="retour">Retour</th>
                            <th scope="col" class="latin" data-type="received">Recue</th>
                            <th scope="col" class="latin" data-type="real">Réel</th>
                            <th scope="col" class="latin" data-type="delivered">Livré</th>
                            <th scope="col" class="latin" data-type="physicalStock">
                                Stock<br class="sm-break">
                                physique
                            </th>
                            <th scope="col" class="latin" data-type="theoreticalStock">
                                Stock<br class="sm-break">
                                theorique
                            </th>
                            <th scope="col" class="latin" data-type="currentStock">
                                Stock<br class="sm-break">
                                en<br class="sm-break">
                                cours
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr height="50">
                            <td colspan="10" class="city">
                                Rabat
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                            <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="reference">
                                <span>SN27</span>
                            </td>
                            <td data-type="productname">
                                <span>المفرمة الكهربائية <br class="sm-break">صنع الماني</span>
                            </td>
                            <td data-type="retour">
                                <span>0</span>
                            </td>
                            <td data-type="received">
                                <span>6</span>
                            </td>
                            <td data-type="real">
                                <span>12</span>
                            </td>
                            <td data-type="delivered">
                                <span>1</span>
                            </td>
                            <td data-type="physicalStock">
                                <span>6</span>
                            </td>
                            <td data-type="theoreticalStock">
                                <span>28</span>
                            </td>
                            <td data-type="currentStock">
                                <span>0</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection