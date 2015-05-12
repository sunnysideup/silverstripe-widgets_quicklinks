<% if WidgetQuickLinksData %>
<ul class="quickLinkEntries">
	<% loop WidgetQuickLinksData %>
		<li><a class="$LinkOrSection $FirstLast" href="$Link"><span>$MenuTitle</span></a></li>
	<% end_loop %>
</ul>
<% end_if %>
