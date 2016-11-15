<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Generator &middot; Advent Calendar</title>
  <meta name="author" content="Nicolas Devenet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico" />
  <link rel="icon" type="image/png" href="../assets/favicon.png" />
  <link href="../assets/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/style.css" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
</head>
<body>

  <div class="container">
    <div class="page-header">
      <h1>
        Generator
        <small>AdventCalendar</small>
      </h1>
    </div>

    <div class="lead">
      I want to generate the file <select data-bind="options: availableGenerators, value: selectedGenerator, event: {change: generatorChanged}"></select>.
      <button class="space-left btn btn-primary" data-bind="click: download, enable: enableDownload">Download</button>
    </div>
    <hr>
  </div>


  <div class="container" data-bind="visible: (selectedGenerator() == 'calendar.json')">
    <h3 class="no-space-top pull-left"><code>calendar.json</code></h3>
    <div class="pull-right"><button class="btn btn-default btn-xs" data-bind="click: clear">Clear</button></div>
    <table class="table table-hover table-bordered">
      <tbody data-bind="foreach: days">
        <tr class="row-day">
          <td data-bind="css: 'day day-color-'+((day%4)+1)">day<br><strong data-bind="text: day"></strong></td>
          <td class="cell-middle">
            <label>Title</label> <input type="text" data-bind="value: title, placeholder: 'Day '+day" class="form-control">
            <label>Legend</label> <input type="text" data-bind="value: legend" class="form-control">
          </td>
          <td>
            <label>Text</label>
            <textarea data-bind="value: text" class="form-control" rows="4"></textarea>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="container" data-bind="visible: (selectedGenerator() == 'settings.json')">
    <h3 class="no-space-top"><code>settings.json</code></h3>
    <div class="clearfix"></div>
    <div class="form row">
      <div class="col-md-4">
        <div class="form-group" data-bind="css: !settings().isValidTitle() ? 'has-error' : ''">
          <label class="control-label">Title <small>required</small></label>
          <input type="text" data-bind="value: settings().title" class="form-control" required>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" data-bind="value: settings().background"> Use alternate background</label>
        </div>
        <div class="form-group">
          <label>Passkey</label>
          <div class="input-group">
            <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
            <input type="text" data-bind="value: settings().passkey" class="form-control">
          </div>
          <span class="help-block">If filled out, visitors need to enter this password to access your AdventCalendar</span>
        </div>
        <div class="form-group">
          <label>Disqus shortname</label>
          <input type="text" data-bind="value: settings().disqus_shortname" class="form-control">
          <span class="help-block">Disqus account to enable comments</span>
        </div>
      </div>

      <div class="col-md-4">
        <hr class="hidden-md hidden-lg">
        <div class="form-group" data-bind="css: !settings().isValidYear() ? 'has-error' : ''">
          <label class="control-label">Year <small>required</small></label>
          <input type="number" data-bind="value: settings().year" class="form-control" required>
        </div>
        <hr>
        <span class="help-block">Fill out to transform your AdventCalendar into CountDownCalendar</span>
        <div class="form-group">
          <label>Month</label>
          <input type="number" data-bind="value: settings().month" class="form-control" min="1" max="12" step="1" placeholder="12">
        </div>
        <div class="form-group">
          <label>First day</label>
          <input type="number" data-bind="value: settings().first_day" class="form-control" min="1" max="31" step="1" placeholder="1">
        </div>
        <div class="form-group">
          <label>Last day</label>
          <input type="number" data-bind="value: settings().last_day" class="form-control" min="1" max="31" step="1" placeholder="24">
        </div>
      </div>

      <div class="col-md-4">
        <hr class="hidden-md hidden-lg">
        <span class="help-block">Fill out to enable <b>Google Analytics</b> tracking</span>
        <div class="form-group">
          <label>GA Tracking ID</label>
          <input type="text" data-bind="value: settings().google_analytics.tracking_id" class="form-control" placeholder="UC-12345-1">
        </div>
        <div class="form-group">
          <label>GA Tracking Domain</label>
          <input type="text" data-bind="value: settings().google_analytics.domain" class="form-control" placeholder="auto">
        </div>
        <hr>
        <span class="help-block">Fill out to enable <b>Piwik</b> tracking</span>
        <div class="form-group">
          <label>Piwik URL</label>
          <input type="url" data-bind="value: settings().piwik.piwik_url" class="form-control" placeholder="https://piwik.domain.tld">
        </div>
        <div class="form-group">
          <label>Piwik Site ID</label>
          <input type="text" data-bind="value: settings().piwik.site_id" class="form-control" placeholder="12345">
        </div>
      </div>
    </div>
  </div>

  <button id="top" class="btn btn-default btn-sm" data-bind="click: top"><i class="glyphicon glyphicon-arrow-up"></i></button>

  <hr>

  <div class="container space-bottom-md">
    <p><a href="https://github.com/Devenet/AdventCalendar/tree/demo" rel="externale">AdventCalendar Generator</a> by <a href="https://nicolas.devenet.info" rel="external">Nicolas Devenet</a></p>
  </div>

  <script src="../assets/jquery.min.js"></script>
  <script src="../assets/bootstrap.min.js"></script>
  <script src="./assets/knockout.min.js"></script>
  <script src="./assets/filesaver.min.js"></script>
  <script src="./assets/scripts.js"></script>
</body>
</html>