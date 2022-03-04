<script src="{{ asset('js/login.js') }}"></script>
<script>
  Validator({
  form: '#form-1',
  rules:[
    Validator.isRequired('#fullName'),
    Validator.isEmail('#email'),
    Validator.isPassWord('#password')
  ]
});
</script>

</body>
</html>