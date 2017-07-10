{{template header .header}}

{{if .books}}
{{elseif .books}}
{{else}}
{{end}}

{{if count($data["books"]) > 0}}
{{elseif count($data["books"]) > 1}}
{{else}}
{{end}}

{{/* 商品数量 */}}
<div>book count: {{count($data["books"])}}</div>

{{/* 商品列表 */}}
<div>
	<table>
{{range .books}}
		<tr>
			<td>{{.id}}</td>
			<td>{{.name}}</td>
			<td>{{.price}}</td>
			<td>{{.cover}}</td>
		</tr>
{{endrange}}
	</table>
</div>

{{/* 商品列表 */}}
<div>
	<table>
{{range $data["books"] as $i => $row}}
{{code $data = $row}}
		<tr>
			<td>{{.id}}</td>
			<td>{{.name}}</td>
			<td>{{.price}}</td>
			<td>{{.cover}}</td>
		</tr>
{{endrange}}
	</table>
</div>

{{template footer .footer}}