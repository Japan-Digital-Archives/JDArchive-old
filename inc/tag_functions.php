<?php
  
  function add_tags($text) {
    $tags = explode(",", $text);
    foreach ($tags as &$tag) {
      $tag = mysql_real_escape_string($tag);
      $sql = "INSERT IGNORE INTO tags (name) VALUES ('$tag')";
      mysql_query($sql);
    }
    
    return;
  }
  
  /* gets comma-seaparated list of tags plus corresponding sid */
  function add_tags_relations($text, $sid) {
    if (!$sid) return;
    
    // first wipe out relations database
    $sql = "DELETE FROM relations WHERE sid = '$sid'";
    mysql_query($sql);
    
    $tags = explode(",", $text);
    foreach ($tags as $tag) {
      $tag = mysql_real_escape_string($tag);
      $tid = get_tid($tag);
      if ($tid) {
        $sql = "INSERT IGNORE INTO relations (tid, sid) VALUES ('$tid', '$sid')";
        mysql_query($sql);
      }
    }
  }

  function edit_tag($tid, $new) {
    $tid = mysql_real_escape_string($tid);
    $new = mysql_real_escape_string($new);
    
    // if new is blank, delete this tag and all mention of it
    if ($new == '') {
      $sql = "DELETE FROM tags WHERE tid = '$tid'";
      mysql_query($sql);
      $sql = "DELETE FROM relations WHERE tid = '$tid'";
      mysql_query($sql);
      return;
    }
    
    // check if new exists; if so, delete old + merge
    $old_tid = get_tid($new);
    if ($old_tid) {
      $sql = "DELETE FROM tags WHERE tid = '$tid'";
      mysql_query($sql);
      $sql = "UPDATE relations SET tid = '$old_tid' WHERE tid = '$tid'";
      mysql_query($sql);
      return;
    }
    
    // just update in general
    $sql = "UPDATE tags SET name = '$new' WHERE tid = '$tid'";
    mysql_query($sql);
  }

  /* converts comma-separated mixed list of tag ids and names to names only */
  function fix_tags($text) {
    $tags = explode(",", $text);
    foreach ($tags as &$tag) {
      $thetag = get_tag($tag);
      if (!$thetag) continue;
      $tag = $thetag;
    }
  
    return implode(",", $tags);
  }

  function get_sids_by_tag($tag) {
    $sids = array();
    $tid = get_tid($tag);
    if (!$tid) return $sids;
    
    $sql = "SELECT sid FROM relations WHERE tid = '$tid'";
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $sids[] = $o->sid;
    }
    
    return $sids;
  }

  function get_tag($tag) {
    $tag = mysql_real_escape_string($tag);
    $sql = "SELECT name FROM tags WHERE tid = '$tag'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) != 1) {
      return false;
    }
    
    $row = mysql_fetch_row($result);
    return $row[0];
  }
  
  function get_tags($sid) {
    $sid = mysql_real_escape_string($sid);
    $tids = array();
    $sql = "SELECT tid FROM relations WHERE sid = '$sid'";
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $tids[] = $o->tid;
    }
    if (!$tids) return '';
        
    $tags = array();
    $tids = implode(',', $tids);
    $sql = "SELECT name FROM tags WHERE tid IN ($tids)";
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $tags[] = $o->name;
    }
    
    return implode(',', $tags);
  }
  
  function get_tag_count($limit = 0) {
    $limit = mysql_real_escape_string($limit);
    $tags = array();
    $sql = "SELECT relations.tid, tags.name, COUNT(*) AS count FROM relations, tags WHERE relations.tid = tags.tid GROUP BY relations.tid ORDER BY count DESC";
    if ($limit) {
      $sql .= " LIMIT $limit";
    }
    $result = mysql_query($sql);
    while ($o = mysql_fetch_object($result)) {
      $tags[] = $o;
    }
    return $tags;
  }
  
  function get_tid($tag) {
    $tag = mysql_real_escape_string($tag);
    $sql = "SELECT tid FROM tags WHERE name = '$tag'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) != 1) {
      return false;
    }
    
    $row = mysql_fetch_row($result);
    return $row[0];
  }

  /* retrieves all tags for auto-complete */
  function tags() {
    $sql = "SELECT tid, name FROM tags";
    $result = mysql_query($sql);
    
    $tags = array();
    while ($row = mysql_fetch_row($result)) {
      $tags[] = array("tid" => $row[0], "name" => $row[1]);
    }
  
    return $tags;
  }

?>