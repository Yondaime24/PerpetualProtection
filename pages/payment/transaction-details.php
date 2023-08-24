<?php
{
	"id": "39326472021936719",
	"intent": "CAPTURE",
	"purchase_units": [ {
		"reference_id": "default",
		"amount": {
			"currency_code": "GBP",
			"value": "4.30" },
		"payee": {
			"email_address": "sb-twcx41025811@business.example.com",
			"merchant_id": "QGDUJLLDDQQ9W" },
		"shipping": {
			"name": {
				"full_name": "John Doe" },
			"address": {
				"address_line_1": "Spitalfields Arts Market",
				"admin_area_2": "London",
				"admin_area_1": "London",
				"postal_code": "E1 6RL",
				"country_code": "GB" }
			},
		"payments": {
			"captures": [ {
				"id": "21993968KG659754L",
				"status": "COMPLETED",
				"amount": {
					"currency_code": "GBP",
					"value": "4.30" },
				"final_capture": true,
				"seller_protection": {
					"status": "ELIGIBLE",
					"dispute_categories": [ "ITEM_NOT_RECEIVED", "UNAUTHORIZED_TRANSACTION" ] },
				"seller_receivable_breakdown": {
					"gross_amount": {
						"currency_code": "GBP",
						"value": "4.30" },
					"paypal_fee": {
						"currency_code": "GBP",
						"value": "0.35" },
					"net_amount": {
						"currency_code": "GBP",
						"value": "3.95" }
					},
			"links": [ {
				"href": "https:\/\/api.sandbox.paypal.com\/v2\/payments\/captures\/21993968KG659754L",
				"rel": "self",
				"method": "GET" },
			{
				"href": "https:\/\/api.sandbox.paypal.com\/v2\/payments\/captures\/21993968KG659754L\/refund",
				"rel": "refund",
				"method": "POST" },
			{
				"href": "https:\/\/api.sandbox.paypal.com\/v2\/checkout\/orders\/39326472021936719",
				"rel": "up",
				"method": "GET" } ],
			"create_time": "2020-03-21T14:30:28Z",
			"update_time": "2020-03-21T14:30:28Z" } ]
			}
		} ],
	"payer": {
		"name": {
			"given_name": "John",
			"surname": "Doe" },
		"email_address": "sb-bd7ux1025210@personal.example.com",
		"payer_id": "7CD2GSDFCE4Y6",
		"address": {
			"country_code": "GB" }
		},
	"create_time": "2020-03-21T14:29:55Z",
	"update_time": "2020-03-21T14:30:28Z",
	"links": [ {
		"href": "https:\/\/api.sandbox.paypal.com\/v2\/checkout\/orders\/39326472021936719",
		"rel": "self",
		"method": "GET" } ],
	"status": "COMPLETED"
}

?>