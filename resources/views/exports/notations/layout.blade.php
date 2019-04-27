<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title></title>
</head>
<style>
@page { size: a4 portrait; }

body {
  padding: 2px;
  margin: 2px;
  font-family: Arial, Helvetica, sans-serif;
}

.container {
  padding: 10px;
  background: white;
  height: 900px;
}

.docHeader {
  width: 100%;
  height: 360px;
  position: relative;
}

.docHeader .rightSide {
  width: 50%;
  height: 250px;
  margin-left: 40%;
  position: absolute;
}

.rightSide .docRef {
  position: absolute;
  margin: 100px 0px 0px 210px;
  width: 100%;
  font-size: 14px;
  font-weight: bold;
}

.docHeader .leftSide {
  width: 40%;
}

.docHeader .docTitle {
  text-align: center;
  margin-top: 5px;
  margin-bottom: -50px;
  text-decoration: underline;
}

.companyInfos {
  margin-top: 20px;
}

.companyInfos h5 {
  margin-bottom: 6px;
  margin-top: 6px;
  font-weight: 900;
}

.docBody {
  margin-top: 5px;
}

.receptionBody {
  border: none;
  width: 90%;
  font-size: 14px;
  font-weight: bold;
}

.receptionBody td {
  height: 5%;
}

.rectangle {
  width: 360px;
  height: 30px;
  border: 1px solid black;
  border-radius: 10px;
}

#commentTD {
  border-bottom: 1px solid black;
  vertical-align: top;
  height: 5%;
}

.commentsTable {
  width: 90%;
  border: 1px solid black;
}

.commentsTable .comments {
  height: 14%;
}

.docFooter {
  width: 100%;
  height: 100px;
  margin-top: 2px;
}

.docFooter .leftSigner {
  width: 50%;
  display: inline-block;
  float: left;
}

.docFooter .rightSigner {
  width: 50%;
  float: left;
  display: inline-block;
}

</style>
<body>
  <div class="container">
    @yield('report')
    <div class="page-break"></div>
  </div>
</body>
</html>
