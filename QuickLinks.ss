<% if QuickLinksData %>
<ul class="QuickLinkEntries">
	<% loop QuickLinksData %>
		<li><a class="$LinkOrSection $FirstLast" href="$Link"><span>$MenuTitle</span></a></li>
	<% end_loop %>
</ul>
<% end_if %>
