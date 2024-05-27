import { Autocomplete, Input, Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Input, Ripple });

const basicAutocomplete = document.querySelector('#search-autocomplete');
const data = ['One', 'Two', 'Three', 'Four', 'Five'];
const dataFilter = (value) => {
  return data.filter((item) => {
    return item.toLowerCase().startsWith(value.toLowerCase());
  });
};

new Autocomplete(basicAutocomplete, {
  filter: dataFilter
});