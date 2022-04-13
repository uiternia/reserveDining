import flatpickr from "flatpickr";
import { Japanese } from "flatpickr/dist/l10n/ja.js";

flatpickr("#menu_date",{
  "locale": Japanese,
 minDate: "today",//登録した日付は選択できないようにしたい
 maxDate: new Date().fp_incr(60)
});