<script type="text/html" id="wf_tmpl">
	<div class="user">
	<a href="uc.php?uid=<%=stream.uid%>"><%=stream.user %></a>:
	<span class="time"><%=stream.create_time %></span>
	</div>
	  <div class="content"><%=stream.content %></div>
	  <ul class="btns" data-id="<%=stream.id%>" data-flag="1">
	  	<li class="commitbtns"><a href="#">commit</a></li>
	  	<li class="retweet"><a href="#">retweet</a></li>
	  </ul>
</script>
<script type="text/html" id="commit_tmpl">
	<ul>
		<% for(var i=0,len=commit.length;i<len;i++) { %>
			<li class="commitList">
				<a href="uc.php?uid=<%=commit[i].uid %>"><%=commit[i].username %></a>
				<span class="commitText"><%=commit[i].content %></span>
				<span class="time">(<%=commit[i].create_time %>)</span>
			</li>
		<% } %>
	</ul>
</script>
<script type="text/html" id="commitform_tmpl">
	<form class="commit-form" method="GET">
		<input placeholder="type something to say" type="text" name="commitText" class="commitText" />
		<input type="button" class="commitBtn" name="commitBtn" value="GO U">
	</form>
</script>