function setDateRangePicker(input1, input2){
	$(input1).datetimepicker({
		format: "YYYY-MM-DD",
		useCurrent: false
	})

	$(input1).on("change.datetimepicker", function (e) {
		$(input2).val("")
        $(input2).datetimepicker('minDate', e.date);
    })

	$(input2).datetimepicker({
		format: "YYYY-MM-DD",
		useCurrent: false
	})
}
