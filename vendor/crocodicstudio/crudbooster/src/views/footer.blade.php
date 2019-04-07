<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-{{ trans('crudbooster.right') }} hidden-xs">
        {{ trans('crudbooster.powered_by') }} {{Session::get('appname')}}
    </div>
    <!-- Default to the left -->
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.3.7/JsBarcode.all.min.js"></script>
    <strong>{{ trans('crudbooster.copyright') }} &copy; <?php echo date('Y') ?>. {{ trans('crudbooster.all_rights_reserved') }} .</strong>
</footer>
