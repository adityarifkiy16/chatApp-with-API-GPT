export default function findUniqueDates(dataFetch) {
  const uniqueDates = [
    ...new Set(dataFetch.map((item) => item.time.split(" ")[0])),
  ];
  return uniqueDates;
}
