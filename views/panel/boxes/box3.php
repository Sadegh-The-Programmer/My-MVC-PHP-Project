<div class="box row">
    <div id="exTabs" class="">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#1" data-toggle="tab">پیغام های من</a>
            </li>
            <li><a href="#2" data-toggle="tab">سفارشات من</a>
            </li>
            <li ><a href="#3" data-toggle="tab">لیست مورد علاقه</a>
            </li>
            <li><a href="#4" data-toggle="tab">نقد های من</a>
            </li>
            <li><a href="#5" data-toggle="tab">نظرات من</a>
            </li>
            <li><a href="#6" data-toggle="tab">کدهای تخفیف من</a>
            </li>
            <li><a href="#7" data-toggle="tab">کارت های هدیه من</a>
            </li>
            <li><a href="#8" data-toggle="tab">اطلاع رسانی</a>
            </li>

        </ul>

        <div class="tab-content ">
            <?php require 'tabs/tab1.php'; ?>
            <?php require 'tabs/tab2.php'; ?>
            <?php require 'tabs/tab3.php'; ?>
            <?php require 'tabs/tab4.php'; ?>
            <?php require 'tabs/tab5.php'; ?>
            <?php require 'tabs/tab6.php'; ?>
            <div class="tab-pane" id="7">
                <h4>کارت های هدیه من</h4>
            </div>
            <div class="tab-pane" id="8">
                <h4>بخش اطلاع رسانی</h4>
            </div>
        </div>
    </div>
</div>
